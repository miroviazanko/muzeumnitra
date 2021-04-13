<?php
/**
* NUMERICAL PAGINATION
*/

function numeric_posts_nav()
{
    if (is_singular())
    return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if ($wp_query->max_num_pages <= 1)
        return;

    $paged=get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    $max=intval($wp_query->max_num_pages);

        /** Add current page to the array */
        if ($paged >= 1)
        $links[] = $paged;

        /** Add the pages around the current page to the array */
        if ($paged >= 3)
        {
            $links[] = $paged - 1;
            $links[] = $paged - 2;
        }

        if (($paged + 2) <= $max)
        {
            $links[]=$paged + 2;
            $links[]=$paged + 1;
        }

        echo '<nav aria-label="pagination"><ul class="pagination">' . "\n" ;

        $previous_p=get_previous_posts_page_link();
        $next_p=get_next_posts_page_link();

        /** Jump to first page */
            printf('<li class="page-item">
                    <a class="page-link px-0" href="%s" aria-label="Previous">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 60">
                            <polyline class="cls-1" points="30 39.17 20 30.21 30 20.83" />
                            <polyline class="cls-1" points="40 39.17 30 30.21 40 20.83" />
                        </svg>
                    </a>
                    </li>' . "\n", esc_url(get_pagenum_link(1)), '1');


        /** Previous Post Link */
            if (get_previous_posts_link())
            printf('<li class="page-item"><a class="page-link px-0" href="'. $previous_p .'" aria-label="Previous">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 60">
                        <polyline class="cls-1" points="35 39.17 25 30.21 35 20.83" />
                    </svg>
                </a></li>' . "\n");

        /** Link to first page, plus ellipses if necessary */
            if (!in_array(1, $links))
            {
                $class = 1 == $paged ? ' class="active"' : '';


                printf('<li%s class="page-item"><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');

                if (!in_array(2, $links))
                echo '<li class="page-item"><a class="page-link">…</a></li>';
            }

                /** Link to current page, plus 2 pages in either direction if necessary */
                sort($links);
                foreach ((array) $links as $link)
                {
                    $class = $paged == $link ? ' class="page-item active"' : '';
                    printf('<li%s class="page-item"><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
                }

                /** Link to last page, plus ellipses if necessary */
                    if (!in_array($max, $links))
                    {
                        if (!in_array($max - 1, $links))
                        echo '<li class="page-item"><a class="page-link">…</a></li>' . "\n";

                        $class = $paged == $max ? ' class="page-item active"' : '';
                        printf('<li%s class="page-item"><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
                    }

                /** Next Post Link */
                        if (get_next_posts_link())
                        printf('<li class="page-item">
                            <a class="page-link px-0" href="'. $next_p .'" aria-label="Next">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 60">
                                    <polyline class="cls-1" points="25 20.83 35 29.79 25 39.17" />
                                </svg>
                            </a>
                        </li>' . "\n");

                /** Jump to Last Page */

                        printf('<li class="page-item">
                            <a class="page-link px-0" href="%s" aria-label="Next">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 60">
                                    <polyline class="cls-1" points="30 20.83 40 29.79 30 39.17" />
                                    <polyline class="cls-1" points="20 20.83 30 29.79 20 39.17" />
                                </svg>
                            </a>
                        </li>' . "\n", esc_url(get_pagenum_link($max)), $max);

                        echo '</ul>
                        </nav>' . "\n";
}
