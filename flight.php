<!doctype html>
<html class="no-js" lang="">

  <head>
    <meta charset="utf-8">
    <title>Flight Search</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link type="text/css" rel="stylesheet" href="styles.css" />
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--<link data-dump-line-numbers="all" data-global-vars='{ "myvar": "#ddffee", "mystr": "\"quoted\"" }' rel="stylesheet/less" type="text/css" href="styles.less">-->

<style>
 //Common Style
* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}
body {
  background: #f7f7f7;
  font-family: 'Cabin', sans-serif;
  font-weight: 300;
  transition: all .3s;
}
@color: #ff3c41;
.fontSizeWeight {
  font-size: 13px;
  font-weight: 200;
}
li {
  list-style: none;
}
input {
  -webkit-appearance: none;
  border-radius: 0;
  border: 0;
}
input[type=button] {
  background: #ff3c41;
  color: #fff;
  cursor: pointer;
  font-size: 13px;
  padding: 8px;
  text-transform: capitalize;
  transition: 0.3s;
  &:hover {
    background-color: #fd3136;
  }
}
form {
  margin: 0 auto;
  width: 90%;
  input:not([type=radio]){
    border: 0px solid #ccc;
    background: #fff;
    color: #333;
    font-size: 14px;
    margin: 8px 0;
    padding: 3% 2%;
    width: 100%;
    transition: 0.3s;
    &:focus {
      color: #000;
    }
  }
  input[type=button] { 
    background: @color;
    color: #fff;
    font-size: 15px;
    padding: 8px;
    width: 100%;
  }
}
//Body Style
main {
  max-width: 1440px;
  margin: 0 auto;
}
#returnDate {
  display: none;
}
header {
  background: #fff;
  text-align: center;
  .planIc {
    color: #000;
    font-size: 40px;
  }
}
.radio-toolbar {
  position: absolute;
  top: -36px;
  left: 0;
  input[type="radio"] {
    display:none; 
  }
  label {
    background-color: @color;
    cursor: pointer;
    display:inline-block;
    padding: 10px 20px;
    transition: all .3s;
    .fontSizeWeight();
  }
  label[for="radioRoundTrip"] {
    margin-left: -3px;
  }
  input[type="radio"]:checked + label { 
    background-color: #333;
  }
}
.styled-checkbox {
  position: absolute;
  opacity: 0;
  transition: all .3s;
  + label {
    font-size: 14px;
    cursor: pointer;
    position: relative;
    padding: 0;
  }
  + label:before {
    background: #ccc;
    display: inline-block;
    content: '';
    height: 20px;
    margin-right: 10px;
    vertical-align: text-top;
    width: 20px;
  }
  &:hover + label:before {
    background: @color;
    transition: all .5s;
  }
  &:checked + label:before {
    background: @color;
  }
  &:checked + label:after {
    background: white;
    box-shadow: 2px 0 0 white, 4px 0 0 white, 4px -2px 0 white, 4px -4px 0 white, 4px -6px 0 white, 4px -8px 0 white;
    -webkit-transform: rotate(45deg);
    content: '';
    height: 2px;
    left: 5px;
    top: 9px;
    position: absolute;
    width: 2px;
    transform: rotate(45deg);
  }
}
#bodyCotainer {
  padding-top: 50px;
  overflow: hidden;
}
.filterSearchFilter {
  float: left;
  margin-left: 4%;
  width: 26%;
  #flightSearch {
    background: #333;
    box-sizing: border-box;
    padding: 2%;
    position: relative;
    div {
      font-size: 13px;
      font-weight: 400;
      color: #fff;
    }
  }
  .showFilter {
    background: #fff;
    box-sizing: border-box;
    margin: 5% 0;
    h4 {
      padding: 5% 5% 0;
      font-size: 14px;
      font-weight: 500;
    }
    ul {
      padding: 0 5% 5%;
      li {
        margin: 4% 0;
        &:last-child {
          margin-bottom: 0;
        }
      }
    }
  }
}
.sourceDesination {
  position: relative;
  ul {
    box-shadow: 5px 5px 5px rgba(0,0,0,0.6);
    display: none;
    border: 1px solid #ccc;
    left: 0.2%;
    position: absolute;
    width: 90%;
    top: 84%;
    z-index: 99;
    li {
      background: #fff;
      color: #555;
      cursor: pointer;
      padding: 8px 5px;
    }
  }
}
#FlightResult {
  float: left;
  width: 70%;
  .flightOnward,
  .flightReturn {
    display: none;
  }
  table {
    border-collapse: collapse;
    text-align: left;
    width: 100%;
    table-layout: fixed;
    thead {
      border-bottom: 5px solid #fff;
      th {
        color: #555;
        padding-left: 9px;
        .fontSizeWeight();
        i {
          cursor: pointer;
          font-size: 11px;
          padding-left: 3px;
        }
        &:last-child {
          cursor: pointer;
        }
      }
    }
    tbody {
      tr {
        background: #f7f7f7;
        border-bottom: 5px solid #fff;
        td {
          color: #333;
          font-size: 13px;
          padding: 12px;
          margin-bottom: 5px;
          i {
            color: #888;
            cursor: pointer;
            font-size: 8px;
            padding: 0 4px;                    
          }
          .bookTicBtn {
            font-size: 10px;
          }
        }
      }
    }
  }
}
.beforeSearch {
  background: #fff;
  color: #555;
  font-size: 16px;
  width: 70%;
  margin: 0 auto;
  padding: 2%;
  text-align: center;
  i {
    color: #555;
    font-size: 45px;
    vertical-align: middle;
    margin-right: 12px;
  }
}
.flightResultWrapper {
  border: 1px solid #e4e4e4;
  box-sizing: border-box;
  background: #fff;
  padding: 5%;
  position: relative;
  margin: 0 auto 4%;
  width: 90%;
  .overLay {
    background: #fff;
    bottom: 0;
    left: 0;
    opacity: 0.7;
    position: absolute;
    right: 0;
    top: 0;
    width: 100%;
    z-index: 99;
  }
  .flightResultHeader {
    align-items: center;
    display: flex;
    margin-bottom: 20px;
    overflow: hidden;
    h4 {
      color: #333;
      font-size: 21px;
      font-weight: 500;
      text-transform: capitalize;
    }
    p {
      color: #888;
      font-size: 12px;
    }
    > div {
      + div {
        margin-left: 3%;
      }
    }
    .exchangeIc {
      color: #888;
      font-size: 20px;
    }
  }
}

//Mobile Resposive
@media only screen and (max-width: 1024px) {
  .flightResultWrapper { 
    .flightResultHeader h4 {
      font-size: 18px;  
    }
  }
  .radio-toolbar { 
    top: -32px;
    label {
      font-size: 14px;
      padding: 7px 14px;
    }
  }
}
@media only screen and (max-width: 768px) { 
  form input:not([type=radio]) {
    font-size: 12px;
  }
  .filterSearchFilter {
    margin-left: 0;
    padding: 0 10px;
    width: 29%;
  }
  .flightResultWrapper { 
    .flightResultHeader h4 {
      font-size: 16px;  
    }
  }
  #FlightResult {
    width: 68%;
  }
  .flightResultWrapper {
    margin: 0 auto 2%;
    padding: 3%;
    width: 96%;
  }
  .radio-toolbar { 
    top: -29px;
    label {
      font-size: 12px;
      padding: 7px 12px;
    }
  }
}
@media only screen and (max-width: 600px) {
  .filterSearchFilter,
  #FlightResult {
    float: none;
    padding: 0 15px;
    width: 100%;
  }
  .flightResultWrapper { width: 100%; }
  .beforeSearch { width: 100%; }
  form input:not([type=radio]) {
    padding: 1.7% 2%;
  }
  #FlightResult table {
    thead th {
      font-size: 12px;
      padding-left: 2px;
    }
    tbody tr td {
      font-size: 12px;
      padding: 5px 2px;
    } 
  }
  .beforeSearch {
    font-size: 14px;
    i {
      font-size: 30px;
    }
  }
}
</style>
<script>
/* Airport JSON list */
const airportSearch = [
  {
    location: "Chennai (MAA)",
    keyword: ["Chennai", "MAA", "Chennai (MAA)"]
  },
  {
    location: "Delhi (DEL)",
    keyword: ["Delhi", "DEL", "Delhi (DEL)"]
  },
  {
    location: "Coimbatore (CJB)",
    keyword: ["Coimbatore", "CJB", "Coimbatore (CJB)"]
  },
  {
    location: "Mumbai (BOM)",
    keyword: ["Mumbai", "BOM", "Mumbai (BOM)"]
  },
  {
    location: "Tiruchirapally (TRZ)",
    keyword: ["Tiruchirapally", "Trichy", "TRZ", "Tiruchirapally (TRZ)"]
  },
  {
    location: "Madurai (IXM)",
    keyword: ["Madurai", "IXM", "Madurai (IXM)"]
  }
];

/* Airlines Array list */
const airlines = ["SpiceJet", "AirFrance", "Indigo", "Luftansa", "Air India", "GoAir"];

/* Flight & Airport Data */
let SearchFlight = function() {
  this.tripType = document.searchFlight.radioOneWay.checked ? "One Way" : "Round Trip";
  this.searchResult = [];
  this.formData = {};
  /* Form input Dats */
  this.getFormData = function() {
    this.formData = {
      fromPlace: document.searchFlight.fromPlace.value,
      toPlace: document.searchFlight.toPlace.value,
      travelDate: document.searchFlight.travelDate.value,
      dateOfReturn: document.searchFlight.dateOfReturn.value,
      noOfTravelers: document.searchFlight.noOfTravelers.value,
    }
  };
  /* One Way & Round Trip Check */
  this.showHideRoundTrip = function() {
    for(var i = 0; i < document.searchFlight.trip.length; i++) {
      document.searchFlight.trip[i].addEventListener("click", () => {
        if(!document.searchFlight.radioOneWay.checked) {
          document.getElementById("returnDate").style.display = "block";  
          this.tripType = "Round Trip";
        }
        else {
          document.getElementById("returnDate").style.display = "none";
          this.tripType = "One Way";
        }
      })
    }
  };
  /* Rendering Airport Result */
  this.renderResult = function(element) {
    let getChildNode = element.parentNode.childNodes;
    let appendList = this.searchResult.map((k,i) => {
      if(this.searchResult.length > 0) {
        let list = document.createElement("li");
        list.innerHTML = k;
        return list; 
      }
    });
    for(let i = 0; i < getChildNode.length; i++) {
      if(getChildNode[i].tagName === "UL") {
        getChildNode[i].style.display = "block";
        getChildNode[i].innerHTML = "";
        for(let j = 0; j < appendList.length; j++) {
          getChildNode[i].appendChild(appendList[j]);
        }

        function getEventTarget(e) {
          e = e || window.event;
          return e.target || e.srcElement; 
        }
        getChildNode[i].onclick = function(event) {
          let target = getEventTarget(event);
          element.value = target.innerHTML;
          getChildNode[i].innerHTML = "";
          getChildNode[i].style.display = "none";
        };
      }
    };
  };
  /* Airport Filtered Values */
  this.airportAutoSuggestion = function(event) {
    let enteredInput = event.target.value;
    let keywordFilter = [];
    let uniqueArray = [];
    let autoSuggestionResult = airportSearch.filter(function(k,i){
      k.keyword.filter(function(place,index){
        let changeJSONCase = place.toLowerCase();
        let changeInputCase = enteredInput.toLowerCase();
        if(changeJSONCase.indexOf(changeInputCase) > -1) {
          return keywordFilter.push(k.location);
        }
      });
      for(var value of keywordFilter){
        if(uniqueArray.indexOf(value) === -1){
          uniqueArray.push(value);
        }
      }
      return uniqueArray;
    });
    this.searchResult = event.target.value != "" ? uniqueArray : [];
    if(this.searchResult == "") {
      console.log("Match not found.. Please Enter correct Value");
    }
    this.renderResult(event.target);
  };
  /* Validate Travel Date Check */
  this.validateEnteredDate = function(event) {
    let selectedDate = new Date(event.target.value);
    let now = new Date();
    if (selectedDate <= now) {
      alert("Date must be in the future");
      event.target.value = "";
    }
  };
  /* Validate Number of Travelers */
  this.validateTravelers = function(event) {
    let selectedTravelers = event.target.value;
    if(selectedTravelers > 8) {
      alert("Please Enter Below 8 Travelers");
      event.target.value = "";
    }
  };
  /* Validting Form after Submit Button */
  this.submitValues = ((event) => {
    this.getFormData();
    const {fromPlace, toPlace, travelDate, dateOfReturn, noOfTravelers} = this.formData;
    const {tripType} = this;
    if(fromPlace !== "" && toPlace !== "" && travelDate !== "" && noOfTravelers !== "") {
      if(tripType === "Round Trip" && dateOfReturn === "") {
        alert("Fields can not be empty");
        return false;
      }
      if(fromPlace === toPlace) {
        alert("From and To place cannot be same");
        return false;
      }
      if(tripType === "Round Trip" && dateOfReturn < travelDate) {
        alert("Return Date must not less then One Way");
        return false;
      }
      if(noOfTravelers <= 0 ) {
        alert("Please Choose Minimum 1 Passenger");
        return false;
      }
      //alert("Form filled");
      this.displayValues();
      AirlineDisplay.call(this);
      this.airlinesList();
      let inputArrayCont = [
          {headText: "Flight Name", sorting: false},
          {headText: "Departure", sorting: false},
          {headText: "Arrival", sorting: false},
          {headText: "Fare", sorting: true}
      ];
      let oneWayTable = new CreateTable("table",inputArrayCont,this.tableContent,"showFilter", 0, "One Way");
      oneWayTable.renderTable();
      oneWayTable.filterRow(0);
      oneWayTable.filter();
      if(tripType === "One Way") {
        document.getElementById("showFilterRoundTrip").style.display = "none";
      }
      if(tripType === "Round Trip") {
        this.airlinesList();
        let roundTrip = new CreateTable("table1",inputArrayCont,this.tableContent,"showFilterRoundTrip", 0, "Round Trip");
        roundTrip.renderTable();
        roundTrip.filterRow(0);
        roundTrip.filter();
         document.getElementById("showFilterRoundTrip").style.display = "block";
      }
    }
    else {
      alert("Fields can not be empty");
    }
  });
  /* Displaying Head Values */
  this.displayValues = function() {
    let displayData = {
      beforeSearch: document.getElementsByClassName("beforeSearch")[0],
      flightOnward: document.getElementsByClassName("flightOnward")[0],
      flightReturn: document.getElementsByClassName("flightReturn")[0] 
    };
    const {beforeSearch, flightOnward, flightReturn} = displayData;
    const {tripType, changeValues} = this;
    if(tripType === "One Way") {
      beforeSearch.style.display = "none";
      flightOnward.style.display = "block";
      flightReturn.style.display = "none";
      changeValues("flightOnward",".headStartLoc",".headStartDate",".headEndLoc",".headEndDate");
    }  
    if(tripType === "Round Trip") { 
      beforeSearch.style.display = "none";
      flightOnward.style.display = "block";

      changeValues("flightOnward",".headStartLoc",".headStartDate",".headEndLoc",".headEndDate");
      flightReturn.style.display = "block";
      changeValues("flightReturn",".returnStartLoc",".returnStartDate",".returnEndLoc",".returnEndDate");
    }
  };
  /* Appeding the Renderd Head Values */
  this.changeValues = ((selectedTripType, startLoc, startDate, endLoc, endDate) => {
    this.getFormData();
    const {fromPlace, toPlace, travelDate, dateOfReturn, noOfTravelers} = this.formData;
    let getTripType = document.getElementsByClassName(selectedTripType);
    let getStaringPlace = getTripType[0].querySelector(startLoc);
    let getStartDate = getTripType[0].querySelector(startDate);
    let getEndPlace = getTripType[0].querySelector(endLoc);
    let getEndDate = getTripType[0].querySelector(endDate);

    if(selectedTripType === "flightOnward") {
      getStaringPlace.innerHTML = fromPlace;
      getStartDate.innerHTML = travelDate;
      getEndPlace.innerHTML = toPlace;
      getEndDate.innerHTML = travelDate;
    }
    if(selectedTripType === "flightReturn") {
      getStaringPlace.innerHTML = toPlace;
      getStartDate.innerHTML = dateOfReturn;
      getEndPlace.innerHTML = fromPlace;
      getEndDate.innerHTML = dateOfReturn;
    }
  });
};

/* Airline Details Listing */
let AirlineDisplay = function() {
  this.airlinesResult = {};
  this.getRandomArbitrary = function (min, max, separator = ".", round = false) {
    let getRandomNumber = (Math.random() * (max - min + 1)) + min;
    let value = getRandomNumber.toFixed(2);
    value = value % 1 < 0.60 ? value : Math.floor(getRandomNumber).toFixed(2);
    //value = round ? Math.round(value) : value;
    let replace = value.replace(".", separator);
    return replace;
  }
  this.airlinesList = (() =>{
    //const {airlinesResult, getRandomArbitrary} = this;
    let airlinesList = [];
    this.airlinesResult = {
      flightName: "",
      departureTime: "",
      arrivalTime: "",
      price: ""
    };
    var rand = Math.floor(Math.random() * airlines.length);
    if(rand === 0) { rand += 1}
    this.tableContent = [];
    for(i=0; i<= rand; i++){
      let rowContent = [];
      this.airlinesResult = {
        flightName: airlines[i],
        departureTime: this.getRandomArbitrary(0,24,":"),
        arrivalTime: this.getRandomArbitrary(0,24,":"),
        price: Math.round(this.getRandomArbitrary(1000,6000) * this.formData.noOfTravelers)
      }
      rowContent.push(airlines[i]);
      rowContent.push(this.airlinesResult.departureTime);
      rowContent.push(this.airlinesResult.arrivalTime);
      rowContent.push(this.airlinesResult.price);
      rowContent.push("<input type='button' class='bookTicBtn' value='Book Now' />");
      this.tableContent.push(rowContent)
    }
  });
}

/* Creating Table with Sorting and Filter */
let CreateTable = function(id,thead,tbody,filterId,filterBy,tripType) {
  this.getParentId = document.getElementById(id);
  this.getFilterId = document.getElementById(filterId);
  this.theadContent = thead;
  this.tbodyContent = tbody;
  this.ascendingSort = true;
  this.filteredValue = [];
  this.filterByRow = [];
  let previousFilterCheck;
  this.filterRow = function(index) {
    const {tbodyContent} = this;
    let filter = tbodyContent.map((k, i) => {
      let innerArr = k.filter((j, l) => {
        if(index === l) {
          this.filteredValue.push(j)
          return j
        }
      })
      return innerArr;
    });
  };
  /* Creating Table */
  this.renderTable = (() => {
    const {getParentId, theadContent, tbodyContent} = this;
    getParentId.innerHTML = "";
    let table = document.createElement("TABLE");
    getParentId.appendChild(table);
    let tableHead = document.createElement("THEAD");
    table.appendChild(tableHead);
    let rowHead = document.createElement("TR");
    tableHead.appendChild(rowHead);
    let tableBody = document.createElement("TBODY");
    table.appendChild(tableBody);
    for(let i=0; i< theadContent.length; i++) {
      let content = document.createElement("TH");
      if(theadContent[i].sorting) {
        let icon = document.createElement("I");
        icon.className = "fa fa-long-arrow-up";
        let textNode = document.createTextNode(theadContent[i].headText);
        content.appendChild(textNode);
        content.appendChild(icon);
        content.addEventListener("click", () => {
          this.sorting(i);
        })
      }
      else {
        content.innerHTML = theadContent[i].headText; 
      }
      rowHead.appendChild(content);
    }
    let appendTrow = tbodyContent.map((k,i) => {
      let tr = document.createElement("tr");
      let appendTd = k.map((j,l) => {
        let td = document.createElement("td");
        td.innerHTML = j;
        return td;
      });
      for(let i = 0; i < appendTd.length; i++) {
        tr.appendChild(appendTd[i]); 
      }
      return tr;
    });
    for(let i=0; i<appendTrow.length; i++) {
      tableBody.appendChild(appendTrow[i]); 
    }
  });
  /* Filter Table */
  this.filter = function() {
    const {filteredValue} = this;
    this.getFilterId.innerHTML = "";
    let filterTitle = document.createElement("H4");
    filterTitle.innerHTML = tripType;
    this.getFilterId.appendChild(filterTitle);
    let filterList = filteredValue.map((k,i) => {
      let createList = document.createElement("LI");
      let filterCheckbox = document.createElement("INPUT");
      filterCheckbox.setAttribute("type", "checkbox");
      filterCheckbox.onclick = this.refineTable;
      filterCheckbox.className = "styled-checkbox";
      filterCheckbox.value = k;
      filterCheckbox.id = k+i + "_" + this.getFilterId.id;
      let filterLabel = document.createElement("LABEL");
      filterLabel.setAttribute("for", k+i + "_" + this.getFilterId.id);
      filterLabel.innerHTML = k;
      createList.appendChild(filterCheckbox);
      createList.appendChild(filterLabel);
      return createList;
    });
    let renderList = document.createElement("UL");
    let filterByValue = [];
    for(let i=0; i< filterList.length; i++) {
      renderList.appendChild(filterList[i]);
    }
    this.getFilterId.appendChild(renderList);
  }
  this.refineTable = ((e) => {
    let targetElement = e.target;
    if(targetElement.checked) {
     this.filterByRow.push(e.target.value); 
    }
    else {
      var index = this.filterByRow.indexOf(e.target.value);
      if (index > -1) {
         this.filterByRow.splice(index, 1);
      }
    }
    if(this.filterByRow.length > 0) {
      let rearrangeArray = [];
      let {tbodyContent} = this;
      for(let i = 0; i<this.filterByRow.length; i++) {
        for(let j = 0; j<tbody.length; j++) {
          for(let k = 0; k<tbody[j].length; k++) {
            if(this.filterByRow[i] === tbody[j][k]) {
              rearrangeArray.push(tbody[j])
            }
          }
        }
      }
      this.tbodyContent = rearrangeArray;
    }
    else {
      this.tbodyContent = tbody;
    }
    this.renderTable();
  });
  /* Table Sorting */
  this.sorting = ((index) => {
    let {tbodyContent} = this;
    let getSortedValue = [];
    let getSortOrder = tbodyContent.map((k,i) => {
      let findIndex = k.filter((j,l) => {
        if(index === l) {
          getSortedValue.push(j);
          return j;
        };
      });
      return findIndex;
    });
    if(this.ascendingSort) {
      getSortedValue.sort(function(a, b) {
        return a - b;
      });
      this.ascendingSort = false;
    }
    else {
      getSortedValue.sort(function(a, b) {
        return b - a;
      });
      this.ascendingSort = true;
    }
    let rearrangeArray = [];
    for(let i = 0; i<getSortedValue.length; i++) {
      for(let j = 0; j<tbodyContent.length; j++) {
        for(let k = 0; k<tbodyContent[j].length; k++) {
          if(getSortedValue[i] === tbodyContent[j][k]) {
            rearrangeArray.push(tbodyContent[j])
          }
        }
      }
    }
    this.tbodyContent = rearrangeArray;
    this.renderTable();
  })
}

let flight = new SearchFlight();
flight.showHideRoundTrip();

</script>

  </head>

  <body>
    <!-- Main Content -->
    <main>
      <header>
        <!--<h1><i class="planIc fa fa-plane"></i></h1>-->
      </header>
      <!-- Body Content Starts -->
      <section id="bodyCotainer">
        <!-- Flight Search From Starts -->
        <div class="filterSearchFilter">
          <aside id="flightSearch">
            <form name="searchFlight">
              <div class="radio-toolbar">
                <input type="radio" id="radioOneWay" name="trip" value="One Way" checked>
                <label for="radioOneWay">One Way</label>

                <input type="radio" id="radioRoundTrip" name="trip" value="Round Trip">
                <label for="radioRoundTrip">Round Trip</label>
              </div>
              <div class="sourceDesination">
                <input type="text" id="fromPlace" placeholder="From" onkeyup="flight.airportAutoSuggestion(event)" />
                <ul id="source"></ul>
                <span class="error"></span>
              </div>
              <div  class="sourceDesination">
                <input type="text" id="toPlace" placeholder="To" onkeyup="flight.airportAutoSuggestion(event)" />
                <ul id="destination"></ul>
                <span class="error"></span>
              </div>
              <div id="depatureDate">
                <input type="text" placeholder="Travel Date" onfocus="(this.type='date')" id="travelDate" onchange="flight.validateEnteredDate(event)" />
              </div>
              <div id="returnDate">
                <input type="text" placeholder="Return Date" onfocus="(this.type='date')" id="dateOfReturn" onchange="flight.validateEnteredDate(event)" />
              </div>
              <div>
                <input type="number" id="noOfTravelers" onchange="flight.validateTravelers(event)" min="1" max ="8" placeholder="Number of Travelers">
              </div>
              <div>
                <input id="searchBtn" type="button" onclick="flight.submitValues(event)" value="Submit" />
              </div>
            </form>
          </aside>
          <div class="filterDetails">
            <div id="showFilter" class="showFilter"></div>
            <div id="showFilterRoundTrip" class="showFilter"></div>
          </div>
        </div>
        <!-- Flight Search From Ends -->
        <!-- Flight List From Starts -->
        <div id="FlightResult">
          <div class="beforeSearch"><i class="fa fa-fighter-jet" aria-hidden="true"></i>Please Make Fight Search</div>
          <div class="flightOnward flightResultWrapper">
            <div class="flightResultHeader">
              <div class="headerStartingDate">
                <h4 class="headStartLoc"></h4>
                <p class="headStartDate"></p>
              </div>
              <div>
                <i class="exchangeIc fa fa-long-arrow-right"></i>
              </div>
              <div class="headeReturnDate">
                <h4 class="headEndLoc"></h4>
                <p class="headEndDate"></p>
              </div>
            </div>
            <table id="table"></table>
          </div>
          <div class="flightReturn flightResultWrapper">
            <div class="flightResultHeader">
              <div class="headerStartingDate">
                <h4 class="returnStartLoc"></h4>
                <p class="returnStartDate"></p>
              </div>
              <div>
                <i class="exchangeIc fa fa-long-arrow-right"></i>
              </div>
              <div class="headeReturnDate">
                <h4 class="returnEndLoc"></h4>
                <p class="returnEndDate"></p>
              </div>
            </div>
            <table id="table1"></table>
          </div>
        </div>
        <!-- Flight List From Ends -->
      </section>
      <!-- Body Content Ends -->
      <footer></footer>
    </main>
    <!--<script>less = { env: 'development'};</script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.9.0/less.min.js"></script>
    <script>less.watch();</script>-->
    <script type="text/javascript" src="script.js">
      /* Flight & Airport Data */
let SearchFlight = function() {
  this.tripType = document.searchFlight.radioOneWay.checked ? "One Way" : "Round Trip";
  this.searchResult = [];
  this.formData = {};

  /* Form input Dats */
  this.getFormData = function() {
    this.formData = {
      fromPlace: document.searchFlight.fromPlace.value,
      toPlace: document.searchFlight.toPlace.value,
      travelDate: document.searchFlight.travelDate.value,
      dateOfReturn: document.searchFlight.dateOfReturn.value,
      noOfTravelers: document.searchFlight.noOfTravelers.value,
    }
  };

  /* One Way & Round Trip Check */
  this.showHideRoundTrip = function() {
    for (var i = 0; i < document.searchFlight.trip.length; i++) {
      document.searchFlight.trip[i].addEventListener("click", () => {
        if (!document.searchFlight.radioOneWay.checked) {
          document.getElementById("returnDate").style.display = "block";
          this.tripType = "Round Trip";
        } else {
          document.getElementById("returnDate").style.display = "none";
          this.tripType = "One Way";
        }
      });
    }
  };

  /* Rendering Airport Result */
  this.renderResult = function(element) {
    let getChildNode = element.parentNode.childNodes;
    let appendList = this.searchResult.map((k, i) => {
      if (this.searchResult.length > 0) {
        let list = document.createElement("li");
        list.innerHTML = k;
        return list;
      }
    });
    for (let i = 0; i < getChildNode.length; i++) {
      if (getChildNode[i].tagName === "UL") {
        getChildNode[i].style.display = "block";
        getChildNode[i].innerHTML = "";
        for (let j = 0; j < appendList.length; j++) {
          getChildNode[i].appendChild(appendList[j]);
        }

        function getEventTarget(e) {
          e = e || window.event;
          return e.target || e.srcElement;
        }

        // Click event listener on List item
        getChildNode[i].addEventListener("click", (e) => {
          let getTargetElement = getEventTarget(e);
          let airportName = getTargetElement.innerHTML;
          this.getAirlineDetails(airportName);
        });
      }
    }
  };

  /* Get Airline Details */
  this.getAirlineDetails = function(airportName) {
    let airlineList = [];
    for (let i = 0; i < airlines.length; i++) {
      if (airportName.toLowerCase() === airlines[i].toLowerCase()) {
        airlineList.push(airlines[i]);
      }
    }
    document.getElementById("airline").innerHTML = airlineList.join(", ");
  };

  /* Search Button Click Event */
  this.searchButton = function() {
    this.getFormData();
    this.showHideRoundTrip();
    this.renderResult(document.getElementById("fromPlace"));
    this.renderResult(document.getElementById("toPlace"));
  };
};

/* Create Object */
let flightSearch = new SearchFlight();

/* Search Button Click Event */
document.getElementById("searchButton").addEventListener("click", () => {
  flightSearch.searchButton();
});

    </script>
  </body>
</html>