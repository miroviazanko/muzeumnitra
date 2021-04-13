"use strict";

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

var SPUCalendar = {
  init: function init(calendarObj) {
    if (!calendarObj || !calendarObj.month || !calendarObj.year || !calendarObj.el) {
      alert("CalendarObj with month & year & el parameters is required!");
      return;
    }

    var el = document.querySelector(calendarObj.el);
    var month = parseInt(calendarObj.month) - 1; // months are zero based

    var year = parseInt(calendarObj.year);
    var thisMonthDays = new Date(year, month + 1, 0).getDate();
    var thisMonthDaysArr = [];
    var firstDay = new Date(year, month, 1);
    firstDay = parseInt(firstDay.getDay()); // 0 based, Sunday is first day of the week !!!

    var lastDay = new Date(year, month, thisMonthDays);
    lastDay = parseInt(lastDay.getDay()); // 0 based, Sunday is first day of the week !!!

    var prevMonthDays = new Date(year, month, 0).getDate(); // Day 0 is the last day in the previous month

    var prevMonthDaysArr = [];
    var prevMonthDaysToShow = firstDay - 1;

    if (firstDay === 0) {
      prevMonthDaysToShow = 6;
    }

    var nextMonthDaysArr = [];
    var nextMonthDaysArrToShow = 7 - lastDay;

    if (lastDay === 0) {
      nextMonthDaysArrToShow = 0;
    } else {
      for (var l = 1; l <= nextMonthDaysArrToShow; l++) {
        nextMonthDaysArr.push(l);
      }
    }

    for (var i = 1; i <= thisMonthDays; i++) {
      thisMonthDaysArr.push(i);
    }

    for (var j = 0; j < prevMonthDaysToShow; j++) {
      var prevToDisplay = prevMonthDays - prevMonthDaysToShow + 1 + j;
      prevMonthDaysArr.push(prevToDisplay);
    }

    el.querySelector(".spu-month").innerHTML = "";
    var k = 0;
    var weekHTML = "";

    while (prevMonthDaysArr.length || thisMonthDaysArr.length || nextMonthDaysArr.length) {
      var appendHTML = function appendHTML() {
        el.querySelector(".spu-month").appendChild(weekHTML);
      };

      if (k % 7 === 0) {
        if (_typeof(weekHTML) === "object") {
          appendHTML();
        }

        weekHTML = "";
        weekHTML = document.createElement("div");
        weekHTML.setAttribute("class", "spu-week");
      }

      if (prevMonthDaysArr.length) {
        // week with days from previous month
        var prevDay = document.createElement("a");
        prevDay.setAttribute("class", "spu-day spu-day-inactive");
        var prevDayContent = document.createTextNode(prevMonthDaysArr[0]);
        prevDay.appendChild(prevDayContent);
        prevMonthDaysArr.shift();
        weekHTML.appendChild(prevDay);
      } else if (!prevMonthDaysArr.length && thisMonthDaysArr.length) {
        // weeks with days from current month
        var thisDay = document.createElement("a");
        thisDay.setAttribute("class", "spu-day");
        thisDay.setAttribute("href", "javascript:void(0);");
        var formattedMonth = ("0" + calendarObj.month).slice(-2);
        var formattedDay = ("0" + thisMonthDaysArr[0]).slice(-2);
        var dataDate = year + "-" + formattedMonth + "-" + formattedDay;
        thisDay.setAttribute("data-date", dataDate);
        var thisDayContent = document.createTextNode(thisMonthDaysArr[0]);
        thisDay.appendChild(thisDayContent);
        thisMonthDaysArr.shift();
        weekHTML.appendChild(thisDay);
      } else if (!thisMonthDaysArr.length && nextMonthDaysArr.length) {
        // week with days from next month
        var nextDay = document.createElement("a");
        nextDay.setAttribute("class", "spu-day spu-day-inactive");
        var nextDayContent = document.createTextNode(nextMonthDaysArr[0]);
        nextDay.appendChild(nextDayContent);
        nextMonthDaysArr.shift();
        weekHTML.appendChild(nextDay);
      } // last week exception


      if (!nextMonthDaysArr.length) {
        appendHTML();
      }

      k++;
    }

    SPUCalendar.markMonthName(el, month);
    SPUCalendar.markYear(el, year);

    if (calendarObj.events) {
      SPUCalendar.markEvents(el, calendarObj.events);
    }
  },
  markMonthName: function markMonthName(el, index) {
    if (!el || !index && index != 0) {
      console.error("Root element or month was not chosen!");
      return;
    }

    var chosenMonth = el.querySelector(".spu-month-name[data-month='" + index + "']");
    chosenMonth.classList.add("is-active");
  },
  markYear: function markYear(el, year) {
    if (!el || !year) {
      console.error("Root element or year was not chosen!");
      return;
    }

    el.querySelector(".spu-year-name").textContent = year;
  },
  markEvents: function markEvents(el, events) {
    if (!Array.isArray(events)) {
      alert("Events MUST be typeof Array!");
      return;
    }

    events.forEach(function (item) {
      var $day = el.querySelector(".spu-day[data-date='" + item + "']");

      if (!$day) {
        return;
      }

      var $hasEvent = $day.querySelector(".spu-event");

      if ($hasEvent) {
        $hasEvent.classList.add("spu-event-more");
      } else {
        var $event = document.createElement("span");
        $event.setAttribute("class", "spu-event");
        $day.appendChild($event);
      }
    });
  },
  goNextMonth: function goNextMonth() {
    var $nextMonth = document.getElementById("showNextMonth");
    $nextMonth.addEventListener("click", function () {
      var chosenMonth = document.querySelector(".spu-month-name[data-month='" + (SPUmonth - 1) + "']");
      chosenMonth.classList.remove("is-active");

      if (SPUmonth == 12) {
        SPUmonth = 1;
        ++SPUyear;
      } else {
        ++SPUmonth;
      }

      SPUCalendar.init({
        el: ".spu-calendar-wrap",
        month: SPUmonth,
        year: SPUyear,
        events: SPUevents
      });
    });
  },
  goPrevMonth: function goPrevMonth() {
    var $prevMonth = document.getElementById("showPrevMonth");
    $prevMonth.addEventListener("click", function () {
      var chosenMonth = document.querySelector(".spu-month-name[data-month='" + (SPUmonth - 1) + "']");
      chosenMonth.classList.remove("is-active");

      if (SPUmonth == 1) {
        SPUmonth = 12;
        --SPUyear;
      } else {
        --SPUmonth;
      }

      ;
      SPUCalendar.init({
        el: ".spu-calendar-wrap",
        month: SPUmonth,
        year: SPUyear,
        events: SPUevents
      });
    });
  }
};
