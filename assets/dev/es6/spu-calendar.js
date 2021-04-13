let SPUCalendar = {
	init: calendarObj => {
		if( !calendarObj || !calendarObj.month || !calendarObj.year || !calendarObj.el ){
			alert("CalendarObj with month & year & el parameters is required!");
			return;
		}

		let el = document.querySelector(calendarObj.el);
		let month = parseInt(calendarObj.month) - 1; // months are zero based
		let year = parseInt(calendarObj.year);

		let thisMonthDays = new Date(year, month+1, 0).getDate();
		let thisMonthDaysArr = [];

		let firstDay = new Date(year, month, 1);
		firstDay = parseInt(firstDay.getDay()); // 0 based, Sunday is first day of the week !!!
		let lastDay = new Date(year, month, thisMonthDays);
		lastDay = parseInt(lastDay.getDay()); // 0 based, Sunday is first day of the week !!!

		let prevMonthDays = new Date(year, month, 0).getDate(); // Day 0 is the last day in the previous month
		let prevMonthDaysArr = [];
		let prevMonthDaysToShow = firstDay - 1;
		if( firstDay === 0 ){
			prevMonthDaysToShow = 6;
		}

		let nextMonthDaysArr = [];
		let nextMonthDaysArrToShow = 7 - lastDay;
		if( lastDay === 0 ){
			nextMonthDaysArrToShow = 0;
		} else {
			for( let l=1; l<=nextMonthDaysArrToShow;l++ ){
				nextMonthDaysArr.push(l);
			}
		}

		for( let i=1; i<=thisMonthDays;i++ ){
			thisMonthDaysArr.push(i);
		}

		for( let j=0; j<prevMonthDaysToShow;j++ ){
			let prevToDisplay = prevMonthDays - prevMonthDaysToShow + 1 + j;
			prevMonthDaysArr.push(prevToDisplay);
		}

		el.querySelector(".spu-month").innerHTML = "";

		let k = 0;
		let weekHTML = "";
		while( prevMonthDaysArr.length || thisMonthDaysArr.length || nextMonthDaysArr.length ){
			let appendHTML = function(){
				el.querySelector(".spu-month").appendChild(weekHTML);
			};

			if( k%7 === 0 ){
				if( typeof weekHTML === "object" ){
					appendHTML();
				}
				weekHTML = "";
				weekHTML = document.createElement("div");
				weekHTML.setAttribute("class", "spu-week");
			}

			if( prevMonthDaysArr.length ){ // week with days from previous month
				let prevDay = document.createElement("a");
				prevDay.setAttribute("class", "spu-day spu-day-inactive");
				
				let prevDayContent = document.createTextNode(prevMonthDaysArr[0]);
				prevDay.appendChild(prevDayContent);
				prevMonthDaysArr.shift();
				weekHTML.appendChild(prevDay);
			} else if( !prevMonthDaysArr.length && thisMonthDaysArr.length ){ // weeks with days from current month
				let thisDay = document.createElement("a");
				thisDay.setAttribute("class", "spu-day");
				thisDay.setAttribute("href", "javascript:void(0);");

				let formattedMonth = ("0" + calendarObj.month).slice(-2);
				let formattedDay = ("0" + thisMonthDaysArr[0]).slice(-2);
				let dataDate = year + "-" + formattedMonth + "-" + formattedDay;
				thisDay.setAttribute("data-date", dataDate);
				
				let thisDayContent = document.createTextNode(thisMonthDaysArr[0]);
				thisDay.appendChild(thisDayContent);
				thisMonthDaysArr.shift();
				weekHTML.appendChild(thisDay);
			} else if( !thisMonthDaysArr.length && nextMonthDaysArr.length ){ // week with days from next month
				let nextDay = document.createElement("a");
				nextDay.setAttribute("class", "spu-day spu-day-inactive");
				
				let nextDayContent = document.createTextNode(nextMonthDaysArr[0]);
				nextDay.appendChild(nextDayContent);
				nextMonthDaysArr.shift();
				weekHTML.appendChild(nextDay);
			}

			// last week exception
			if( !nextMonthDaysArr.length ){
				appendHTML();
			}

			k++;
		}

		SPUCalendar.markMonthName(el, month);
		SPUCalendar.markYear(el, year);

		if( calendarObj.events ){
			SPUCalendar.markEvents(el, calendarObj.events);
		}
	},
	markMonthName: (el, index) => {
		if( !el || (!index && index != 0) ){
			console.error("Root element or month was not chosen!");
			return;
		}

		let chosenMonth = el.querySelector(".spu-month-name[data-month='" + index + "']");
		chosenMonth.classList.add("is-active");
	},
	markYear: (el, year) => {
		if( !el || !year ){
			console.error("Root element or year was not chosen!");
			return;
		}

		el.querySelector(".spu-year-name").textContent = year;
	},
	markEvents: (el, events) => {
		if( !Array.isArray(events) ){
			alert("Events MUST be typeof Array!");
			return;
		}

		events.forEach(item => {
			let $day = el.querySelector(".spu-day[data-date='" + item + "']");
			if( !$day ){
				return;
			}

			let $hasEvent = $day.querySelector(".spu-event");

			if( $hasEvent ){
				$hasEvent.classList.add("spu-event-more");
			} else {
				let $event = document.createElement("span");
				$event.setAttribute("class", "spu-event");
				$day.appendChild($event);
			}
		});
	},
	goNextMonth: () => {
		let $nextMonth = document.getElementById("showNextMonth");
	
		$nextMonth.addEventListener("click", function(){
			let chosenMonth = document.querySelector(".spu-month-name[data-month='" + (SPUmonth-1) + "']");
			chosenMonth.classList.remove("is-active");
	
			if(SPUmonth == 12){
				SPUmonth = 1;
				++SPUyear;
			}else{
				++SPUmonth;
			}
	
			SPUCalendar.init({
				el: ".spu-calendar-wrap",
				month: SPUmonth,
				year: SPUyear,
				events: SPUevents,
			});
		});
	},
	goPrevMonth: () => {
		let $prevMonth = document.getElementById("showPrevMonth");

		$prevMonth.addEventListener("click", function(){
			var chosenMonth = document.querySelector(".spu-month-name[data-month='" + (SPUmonth-1) + "']");
			chosenMonth.classList.remove("is-active");
	
			if(SPUmonth == 1){
				SPUmonth = 12;
				--SPUyear;
			}else{
				--SPUmonth;
			};
			
			SPUCalendar.init({
				el: ".spu-calendar-wrap",
				month: SPUmonth,
				year: SPUyear,
				events: SPUevents,
			});
		});
	},
}