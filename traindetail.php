<html>
  <head>
<style>
:root {
  --app-bg-color: #1C1D21;
  --app-dark-color: #31353D;
  --app-accent-color: #445878;
  --app-alt-color: #92CDCF;
  --app-light-color: #EEEFF7;
}

html, body { min-height: 100% }

body {
  font-family: 'Roboto', sans-serif;
  color: #444;
  background-color: #EEEFF7;
  background-image:linear-gradient(120deg, #00c6ff 0%, #0072ff 100%);
}

.wrap {
  background-color: #1C1D21;
  position: relative;
  display: block;
  height: 610px;
  width: 365px;
  margin: 10px auto;
  box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.3);
  /*border-radius: 5px;*/
}

.headbar {
  width: calc(100% - 15px);
    height: 60px;
    color: #fff;
    background-color: var(--app-accent-color);
    display: flex;
    align-items: center;
    padding-left: 15px;
    font-size: 1.1em;
    font-weight: 500;
}

.headbar .btnBack { 
  margin-right: 15px;
  cursor: pointer; 
}

.header {
  width: 365px;
  height: 150px; /*200px;*/
  position: relative;
  transition: all 0.8s ease-in-out;
  background-image: linear-gradient(45deg, #445878 0%, #92CDCF 100%);
  /*background: var(--app-accent-color);*/
  transition: all 0.8s ease;
}

.header .bg,
.header .filter {
  position: absolute; 
  width: 100%; 
  height: 100%;
  background-color: rgba(112, 225, 245, 0.25);
}

.header .bg {
  background-image: url(https://dl.dropbox.com/s/8bg4zheauoyudeo/bg-city.jpg);
  background-size: 380px;
  opacity: 0;
  transition: all 0.8s ease;
}

.header .map {
  width: 100%;
  height: 100%;
  background-image: url(https://dl.dropbox.com/s/kvg6ykrz66kn9oe/map2.png);
  background-position: -110px -150px;
  /*background-position: -120px -120px;
  background-size: 680px;*/
  opacity: 1;
  transition: all .4s ease;
  position: absolute;
  transition: all .4s ease;
}

.header .title {
  display: none;
  align-items: center;
    justify-content: space-around;
    font-size: 2em;
    color: #fff;
    height: 100%;
}

.title > div { z-index: 10; }
.title span { 
  display: inline-block;
    font-weight: 400;
    font-size: 1.2em;
    text-shadow: 1px 1px 2px rgba(0,0,0,.25); 
}

div.rotate span { animation: rotate .6s linear }
div.rotate span:nth-child(2) { animation-delay: .1s }
div.rotate span:nth-child(3) { animation-delay: .3s }

@keyframes rotate {
  from { transform: rotateY(0deg); }
  to { transform: rotateY(360deg); }
}

.title .separator i {
  transform: rotate(90deg);
  font-size: .7em;
}

.content {
  height: calc(100% - 210px);
  background-color: var(--app-bg-color);
  position: relative;
  overflow: hidden;
  transition: all 0.8s ease;
}

.content > section {
  position: relative;
  width: 300%;
  height: 100%;
}

.wrap[data-pos="0"] .content > section { transform: translateX(0) }
.wrap[data-pos="1"] .content > section { transform: translateX(-365px) }
.wrap[data-pos="2"] .content > section { transform: translateX(-730px) }

.content > section > div { opacity: 0; }
.wrap[data-pos="0"] .content > section > div:nth-child(1) { opacity: 1; transition: opacity .8s ease; }
.wrap[data-pos="1"] .content > section > div:nth-child(2) { opacity: 1; transition: opacity .8s ease; }
.wrap[data-pos="2"] .content > section > div:nth-child(3) { opacity: 1; transition: opacity .8s ease; }

.wrap[data-pos="0"] .btnBack { display: none; }
.wrap[data-pos="0"] .header .title { display: flex }
.wrap[data-pos="0"] .header .bg { opacity: 1 }
.wrap[data-pos="0"] .header .map { opacity: 0 }

.wrap[data-pos="0"] .header { height: 140px }

.wrap[data-pos="0"] .content {
  height: calc(100% - 200px);
  transition: all 0.8s ease;
}

.wrap[data-pos="1"] .content .list article .img,
.wrap[data-pos="1"] .content .list article .info { 
  opacity: 1;
  transform: translateX(0);
}

.wrap[data-pos="2"] .header { height: 0px }
.wrap[data-pos="2"] .content { height: calc(100% - 80px); }

.form, .list, .ticket {
  float: left;
  width: 33.33333%;
  height: 100%;
  padding: 0;
  margin: 0;
  color: #e5e5e5;
  position: relative;
}

.control {
  position: relative;
  top: 0;
  height: 60px;
  display: flex;
  align-items: center;
  padding: 5px;
  background: #1C1D21; /*var(--app-bg-color);*/
  border-bottom: solid 1px rgba(255, 255, 255, 0.05);
  /*border-top: solid 1px rgba(0, 0, 0, 0.4);*/
  transition: all .4s ease;
}

.control:last-child {
  height: 55px;
  border-bottom: none;
  padding: 0;
}

/*Preview hack*/
.control-head > * { float: left; }

.control-head > i,
.control > i {
  font-size: 1.5em;
  margin-left: 15px;
}

.control-head > div,
.control > .control-item {
  margin-left: 20px;
}

.control h6 { 
  margin: 5px 0;
  font-weight: 400;
  color: #bbb;
}

.control.open:nth-child(2) { top: -72px; }
.control.open:nth-child(3) { top: -144px; }

.control.open {
  height: 100%;
  transition: all .4s ease;
}

.control .control-head { 
  display: flex; 
  align-items: center;
  margin-top: 5px; 
  cursor: pointer;
}

.control .control-body { 
  height: calc(100% - 72px);
  margin-top: 20px;
}

.control.open .control-body { 
  margin-top: 8px; 
}

.control.dateinput,
.control.select { display: block; }

.control .close {
  display: none;
  position: absolute;
  right: 15px;
  top: 15px;
  font-size: 20px;
}
.control.open .close {
  display: block;
  cursor: pointer;
}

/*** Begin Select Input ***/
.select .nano { 
  width: 304px;
  height: 418px;
  margin-left: 50px;
}

.select ul.select-index,
.select ul.select-data {
  margin: 0;
  margin-top: 10px;
  padding: 0;
  list-style: none;
}

.select.open ul.select-data li {
  opacity: 1;
  transform: translateY(0);
  transition: transform .6s ease;
}
.select ul.select-data li {
  margin: 5px 0;
  padding: 3px 15px;
  font-size: .85em;
  opacity: 0;
  transform: translateY(700px);
  transition: all .3s ease;
  cursor: pointer;
}

.select ul.select-data li:hover,
.select ul.select-data li.selected {
  background-color: rgba(0,0,0, .4);
}

.select ul.select-data li.sep {
  background-color: var(--app-accent-color);
}

.select ul.select-index {  
  position: absolute;
  left: 15px;
}

.select ul.select-index li {
  margin: 8px 0;
  padding: 2px 6px;
  border-radius: 50%;
  text-align: center;
  font-size: .9em;
  background-color: var(--app-accent-color);
  cursor: pointer;
}

/*** Begin Date Input ***/
.dateinput .control-body {
  opacity: 0;
  transition: opacity .6s ease;
}

.dateinput.open .control-body {
  opacity: 1;
  transition: opacity .8s ease;
}

.dateinput .calendar {
  margin-top: 10px;
}

.dateinput .calendar .month,
.dateinput .calendar .week,
.dateinput .calendar .days { 
  display: flex; 
  width: 100%;
  padding: 5px; 
}

.dateinput .calendar .month { 
  justify-content: space-around;
  background-color: var(--app-accent-color);
  margin-left: -5px; 
}

.dateinput .calendar .week,
.dateinput .calendar .days {
  flex-wrap: wrap;
}

.dateinput .calendar .week span,
.dateinput .calendar .days span {
  width: 40px;
  padding: 5px;
  text-align: center;
  font-weight: 300;
  font-size: .85em;
  position: relative;
}

.dateinput .calendar .week span {
  color: var(--app-alt-color);
  font-weight: 400;
}

.dateinput .calendar .days span:before {
  content: "";
  display: block;
  width: 22px;
  height: 22px;
  position: absolute;
  left: 14px;
  top: 3px;
  border-radius: 1px;
  background-color: transparent;
  transition: all .4s ease;
  cursor: pointer;
}

.dateinput .calendar .days span.checked:before {
  background-color: rgba(112, 225, 245, 0.3);
  border-radius: 50%;
  transition: all .4s ease;
}

.dateinput .calendar .days span:first-child {
  color: transparent;
}

.info-message { 
  margin-top: 30px;
    padding: 0 5px 0 15px;
    font-weight: 400;
    font-style: italic;
  font-size: .75em;
  color: var(--app-alt-color);
  letter-spacing: .06em; 
}
.info-message  i {
  margin-right: 5px;
    font-size: 1.2em;
}


/*** Begin Radio Input ***/
.radio label input[type="radio"] {  
  display: none;
}

.radio label > span,
.radio label > div {
  cursor: pointer;
  margin-right: 4px;
  padding: 4px 8px;
    border-radius: 3px;
    background-color: transparent;
    transition: background .4s ease;
}

.radio label input[type="radio"]:checked ~ span,
.radio label input[type="radio"]:checked ~ div {
  background-color: rgba(0, 0, 0, 0.4);
  transition: background .4s ease;
}

.radio label > div { display: inline-block; text-align: center; margin-right: 30px; }
.radio label > div small { display: block; font-size: .75em; }
.radio label > div span { margin-right: 4px; }
.radio label > div i { margin-left: 4px; }

/*** Begin Spinner Input ***/
.spinner {
  height: 100%;
  position: absolute;
  right: 0;
}
.spinner button {
  width: 42px;
  height: 50%;
  display: block;
  padding: 5px;
  border: none;
  color: #fff;
  background-color: var(--app-dark-color); 
  outline: none;
}

.spinner button:first-child {
  border-bottom: solid 1px #444;
}

.control > button {
  width: 100%;
  height: 100%;
  padding: 10px 2px;
  border: none;
  border-radius: 2px;
  color: #fff;
  background-color: var(--app-dark-color); /*#2196F3*/
  outline: none;
  text-transform: uppercase;
}

.control button:hover { background-color: rgba(255,255,255, .2); }

.list article {
  display: flex;
    width: 100%;
    height: 100px;
    transition: all 0.4s ease;
}

.list article:nth-child(2n+1) {
  background-color: rgba(255,255,255,.04);
}

.list article div.img {
  height: 100%;
  background-color: rgba(255, 255, 255, 0.05);
    display: flex;
    align-items: center;
    padding: 0 10px;
  opacity: 0;
  transform: translateX(-1000px);
  transition: all 0.6s cubic-bezier(0.645, 0.045, 0.355, 1);
}

.list article img {
  width: 48px;
    height: 48px;
    
}

.list article .info {
  padding: 10px;
  width: 100%;
  color: #e5e5e5;
  font-size: .8em;
  position: relative;
  opacity: 0;
  transform: translateX(1000px);
  transition: all 0.6s cubic-bezier(0.645, 0.045, 0.355, 1);
}

.list article:nth-child(2) > div { transition-delay: .12s }
.list article:nth-child(3) > div { transition-delay: .24s }
.list article:nth-child(4) > div { transition-delay: .36s }
.list article:nth-child(5) > div { transition-delay: .48s }


.info span { display: block; }
.info b { font-weight: 400; }
.info .time {
  color: #bbb;
  position: absolute;
  right: 10px;
  top: 10px;
}
.info .airline {
  display: block;
  font-size: 1.4em;
}

.info h5 {
  margin: 0;
  font-size: 1.4em;
      font-weight: 500;
    position: absolute;
    right: 10px;
    bottom: 10px;
}

.info h5 small {
  color: #bbb;
  font-size: .6em;
}

.ticket {
  display: flex;
  flex-direction: column;
    justify-content: center;
}

.ticket section {
  background-color: var(--app-dark-color);
  height: 350px;
  margin: 10px 20px;
    border-radius: 2px;
}

.ticket .title {
  display: flex;
    justify-content: space-around;
    margin: 15px 10px;
}

.ticket .title > div { text-align: center; }

.ticket .title span {
  font-size: 2em;
  text-shadow: none;
  display: block;
}

.ticket .title small { display: block; }

.ticket .separator i { position: relative; top: 10px; }

.ticket .row { 
  display: flex;
  justify-content: space-around;
  width: calc(100% + 40px);
  margin-top: 20px; 
}

.ticket .cell { 
      width: 140px;
}

.ticket .cell small {
  display: block;
  color: var(--app-alt-color);
}

.ticket .total {
  margin: 25px 40px 0;
    text-align: right;
}

.ticket .total span {
  font-size: 1.7em;
}

.ticket .total small {
  margin-right: 10px;
    color: #92cdcf;
}

.ticket button {
  height: 40px;
  padding: 10px 2px;
  margin: 10px 20px;
  border: none;
  border-radius: 2px;
  background-color: var(--app-accent-color);
  outline: none;
  color: var(--app-light-color);
  text-transform: uppercase;
  cursor: pointer;
}

.ticket button i {
  font-size: 16px;
    margin-right: 5px;
}

.btnHome { background-color: #432; }

/** Loader **/
.loader,
.loader:before,
.loader:after {
  border-radius: 50%;
  width: 1.8em;
  height: 1.8em;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
  -webkit-animation: load7 1.8s infinite ease-in-out;
  animation: load7 1.8s infinite ease-in-out;
}
.loader {
  display: none;
  color: #ffffff;
  font-size: 10px;
  margin: 5px auto;
  position: relative;
  text-indent: -9999em;
  -webkit-transform: translateZ(0);
  -ms-transform: translateZ(0);
  transform: translateZ(0);
  -webkit-animation-delay: -0.16s;
  animation-delay: -0.16s;
}
.loader:before,
.loader:after {
  content: '';
  position: absolute;
  top: 0;
}
.loader:before {
  left: -3.5em;
  -webkit-animation-delay: -0.32s;
  animation-delay: -0.32s;
}
.loader:after {
  left: 3.5em;
}
@-webkit-keyframes load7 {
  0%,
  80%,
  100% {
    box-shadow: 0 2.5em 0 -1.3em;
  }
  40% {
    box-shadow: 0 2.5em 0 0;
  }
}
@keyframes load7 {
  0%,
  80%,
  100% {
    box-shadow: 0 2.5em 0 -1.3em;
  }
  40% {
    box-shadow: 0 2.5em 0 0;
  }
}
  </style>
  <script>
// Play with the inputs -->
var flights = [
    {
        currency: "EUR",
        price: 128.67,
        carrier: "KL",
        time: "2h 30min",
        nodes: ["CDG 2017-05-30T09:35+02:00 AMS 2017-05-30T11:15+02:00"]
    },
    {
        currency: "EUR",
        price: 138.70,
        carrier: "AF",
        time: "2h 30min",
        nodes: ["CDG 2017-05-30T12:35+02:00 AMS 2017-05-30T13:50+02:00"]
    },
    {
        currency: "EUR",
        price: 151.41,
        carrier: "BA",
        time: "2h 30min",
        nodes: ["CDG 2017-05-30T11:40+02:00 AMS 2017-05-30T12:55+02:00"]
    },
    {
        currency: "EUR",
        price: 174.70,
        carrier: "KL",
        time: "2h 30min",
        nodes: ["CDG 2017-05-30T18:35+02:00 AMS 2017-05-30T19:50+02:00"]
    },
    {
        currency: "EUR",
        price: 204.70,
        carrier: "AF",
        time: "2h 30min",
        nodes: ["CDG 2017-05-30T11:40+02:00 AMS 2017-05-30T12:55+02:00"]
    }
];

var carrier = {
    "AF": "Air France",
    "KL": "KLM Royal Dutch Airlines",
    "BA": "British Airways"
};

var airports = [{"name":"Vichy-Charmeil Airport","city":"Vichy","country":"France","IATA":"VHY"},{"name":"Lyon-Bron Airport","city":"Lyon","country":"France","IATA":"LYN"},{"name":"Cannes-Mandelieu Airport","city":"Cannes","country":"France","IATA":"CEQ"},{"name":"Marseille Provence Airport","city":"Marseille","country":"France","IATA":"MRS"},{"name":"Charles de Gaulle International","city":"Paris","country":"France","IATA":"CDG"},{"name":"Toussus-le-Noble Airport","city":"Toussous-le-noble","country":"France","IATA":"TNF"},{"name":"Paris-Orly Airport","city":"Paris","country":"France","IATA":"ORY"},{"name":"Le Mans-Arnage Airport","city":"Le Mans","country":"France","IATA":"LME"},{"name":"Nantes Atlantique Airport","city":"Nantes","country":"France","IATA":"NTE"},{"name":"Nancy-Essey Airport","city":"Nancy","country":"France","IATA":"ENC"},{"name":"Frankfurt am Main International","city":"Frankfurt","country":"Germany","IATA":"FRA"},{"name":"Hamburg Airport","city":"Hamburg","country":"Germany","IATA":"HAM"},{"name":"Cologne Bonn Airport","city":"Cologne","country":"Germany","IATA":"CGN"},{"name":"Munich International Airport","city":"Munich","country":"Germany","IATA":"MUC"},{"name":"Stuttgart Airport","city":"Stuttgart","country":"Germany","IATA":"STR"},{"name":"Berlin-Tegel International Airport","city":"Berlin","country":"Germany","IATA":"TXL"},{"name":"Hannover Airport","city":"Hannover","country":"Germany","IATA":"HAJ"},{"name":"Bremen Airport","city":"Bremen","country":"Germany","IATA":"BRE"},{"name":"Frankfurt-Hahn Airport","city":"Hahn","country":"Germany","IATA":"HHN"},{"name":"Dortmund Airport","city":"Dortmund","country":"Germany","IATA":"DTM"},{"name":"Cork Airport","city":"Cork","country":"Ireland","IATA":"ORK"},{"name":"Galway Airport","city":"Galway","country":"Ireland","IATA":"GWY"},{"name":"Dublin Airport","city":"Dublin","country":"Ireland","IATA":"DUB"},{"name":"Waterford Airport","city":"Waterford","country":"Ireland","IATA":"WAT"},{"name":"Amsterdam Airport Schiphol","city":"Amsterdam","country":"Netherlands","IATA":"AMS"},{"name":"Maastricht Aachen Airport","city":"Maastricht","country":"Netherlands","IATA":"MST"},{"name":"Eindhoven Airport","city":"Eindhoven","country":"Netherlands","IATA":"EIN"},{"name":"Rotterdam The Hague Airport","city":"Rotterdam","country":"Netherlands","IATA":"RTM"},{"name":"Belfast International Airport","city":"Belfast","country":"United Kingdom","IATA":"BFS"},{"name":"Manchester Airport","city":"Manchester","country":"United Kingdom","IATA":"MAN"},{"name":"Southampton Airport","city":"Southampton","country":"United Kingdom","IATA":"SOU"},{"name":"London Heathrow Airport","city":"London","country":"United Kingdom","IATA":"LHR"},{"name":"Blackpool International Airport","city":"Blackpool","country":"United Kingdom","IATA":"BLK"},{"name":"Newcastle Airport","city":"Newcastle","country":"United Kingdom","IATA":"NCL"},{"name":"London Stansted Airport","city":"London","country":"United Kingdom","IATA":"STN"},{"name":"Miami International Airport","city":"Miami","country":"United States","IATA":"MIA"},{"name":"John F Kennedy International Airport","city":"New York","country":"United States","IATA":"JFK"},{"name":"Piedmont Triad International Airport","city":"Greensboro","country":"United States","IATA":"GSO"},{"name":"Wings Field","city":"Philadelphia","country":"United States","IATA":"BBX"},{"name":"Hardwick Field","city":"Cleveland","country":"United States","IATA":"HDI"},{"name":"Warren Field","city":"Washington","country":"United States","IATA":"OCW"}];

(function () {
	
	var _airports = _.groupBy(airports, o => o.country),
		selectIndex = [], 
		selectData = [];

	_.each(_airports, (countryList, countryName) => {
		var firstLeter = countryName.split('')[0];
		selectData.push(`<li class="sep" data-index="${firstLeter}">${countryName}</li>`);
		selectIndex.push(`<li>${firstLeter}</li>`);

		_.each(countryList, (airport, i) => {
			selectData.push(`<li data-iata="${airport.IATA}" data-city="${airport.city}">
				${airport.IATA}, ${airport.name}</li>`);
		});
	});

	$('.select ul.select-index').html(_.uniq(selectIndex).join(''));
	$('.select ul.select-data').html(selectData.join(''));


	// Calendar days
	var days = [30];
	for (var i = 0; i < 31; i++) { days.push(i); }

	var daysRender = _.map(days, function(i) {
		return `<span>${i+1}</span>`;
	});
	
	$('.calendar .days').html(daysRender.join(''));
	$('.calendar .days span').eq(8).addClass('checked');

	// Flight Results
	doFlightsRender(true);


	// Events
	// Open inputs
	$('.control:not(.open) .control-head').on('click', function(evt) {
		$(evt.currentTarget).parent('.control').addClass('open');
	});

	$('.control .close').on('click', function(evt) {
		var z = $(evt.currentTarget).closest('.control');
		setTimeout(() => { z.removeClass('open') }, 50);
	});

	// SpinnerInput add/substract action
	$('.spinner button').on('click', function(evt) {
		var isAdding = evt.currentTarget.getAttribute('data-action') == 'plus',
			$input = $('input[name="passengers"]:checked'),
			$control = $input.siblings('div').find('span'),
			value = parseInt($control.text());

		if(isAdding)
			value++;
		else if (value !== 0)
			value--;

		$control.text(value);
	});

	// SelectInput find index
	$('.select-index').on('click', 'li', function(evt) {
		var index = evt.currentTarget.textContent,
			$nano = $(evt.currentTarget).parent('.select-index').siblings('.nano'),
			el = $nano.find(`li.sep[data-index="${index}"]`)[0];

		$nano.find('.nano-content').animate({ scrollTop: el.offsetTop }, 600);
	});

	// SelectInput set data
	$('.select-data').on('click', 'li:not(.sep)', function(evt) {
		var text = evt.currentTarget.textContent,
			iata = evt.currentTarget.getAttribute('data-iata'),
			$select = $(evt.currentTarget).closest('.select'),
			$nameContainer = $select.find('.airport-name');

		if($nameContainer.data('role') == 'from') {
			var _iata = iata.split('');
			var div = $('.header .fromPlace').addClass('rotate');
			var span = $('.header .fromPlace span');
			span.eq(0).text(_iata[0]);
			span.eq(1).text(_iata[1]);
			span.eq(2).text(_iata[2]);
			setTimeout(() => div.removeClass('rotate'), 900);
			//$('.xfrom').text(iata);
		}
		else {
			var _iata = iata.split('');
			var div = $('.header .toPlace').addClass('rotate');
			var span = $('.header .toPlace span');
			span.eq(0).text(_iata[0]);
			span.eq(1).text(_iata[1]);
			span.eq(2).text(_iata[2]);
			setTimeout(() => div.removeClass('rotate'), 900);
			//$('.xto').text(iata);
		}

		$nameContainer.text(text);
		$select.toggleClass('open');

		$(evt.currentTarget).addClass('selected').siblings('li').removeClass('selected');
	});

	// Date input
	$('.calendar .days span').on('click', function(evt) {
		var $this = $(evt.currentTarget),
			day = evt.currentTarget.textContent;

		$this.addClass('checked').siblings('span').removeClass('checked');

		var date = new Date(`5/${day}/2017`);
		var [wd, m, d] = date.toDateString().split(' ');
		$('.dateinput .control-item span').eq(0).text(`${wd.toUpperCase()}, ${d} ${m}`);
	});


	$('.btnBack').on('click', function(evt) {
		var wrap = document.querySelector('.wrap'),
			index = parseInt(wrap.getAttribute('data-pos'));
		
		$('.ticket button.btnBook').text('Book Flight');
		wrap.setAttribute('data-pos', index - 1);
	});

	// Search button
	$('.btnSearch').on('click', function(evt) {
		doFlightsRender(false);
		setTimeout(() => {
			document.querySelector('.wrap').setAttribute('data-pos', 1);
		}, 50);
	});

	$('.ticket button').on('click', function(evt) {
		var $button = $(evt.currentTarget);
		var $loader = $('.loader').show();
		$button.text('Booking...');

		setTimeout(() => {
			$loader.hide();
			$button.html('<i class="zmdi zmdi-check-circle"></i> Flight Booked');
			$button.addClass('success');
		}, 1200);
	});

	// Select Flight
	$('.list').on('click', 'article', function(evt) {
		var index = parseInt(evt.currentTarget.getAttribute('data-index')),
			flight = flights[index];

		var [from, t1, to, t2] = flight.nodes[0].split(' ');

		var p = $('.radio.passengers label span'),
			peopleTotal = 0,
			people = _.map(p, function(el, i) {
				var v = parseInt(el.textContent),
					str = '';

				if(i == 0 && v)
					str = `${v} Adults`;
				if(i == 1 && v)
					str = `${v} Kids`;
				if(i == 2 && v)
					str = `${v} Elders`;
				
				peopleTotal += v;

				return str;
			});

		from = $('.fromPlace span').text();
		to = $('.toPlace span').text();

		var time1 = new Date(t1), 
			time2 = new Date(t2);

		var clase = $('input[name="seat"]:checked').val(),
			dates = $('.dateinput .control-item span'),
			place1 = _.findWhere(airports, {IATA: from}),
			place2 = _.findWhere(airports, {IATA: to});

		var flightRender = `
			<div class="title">
				<div>
					<small>${time1.toLocaleTimeString().replace(':00','')}</small>
					<span>${from}</span>
					<small>${place1.city}</small>
				</div>
				<span class="separator"><i class="zmdi zmdi-airplane"></i></span>
				<div>
					<small>${time2.toLocaleTimeString().replace(':00','')}</small>
					<span>${to}</span>
					<small>${place2.city}</small>
				</div>
			</div>
			<div class="row">
				<div class="cell">
					<small>Passengers</small><span>${_.compact(people).join(',')}</span>
				</div>
				<div class="cell">
					<small>Class</small><span>${clase}</span>
				</div>
			</div>
			<div class="row">
				<div class="cell">
					<small>Departure</small><span>${dates[0].textContent}</span>
				</div>
				<div class="cell">
					<small>Return</small><span>${dates[1].textContent}</span>
				</div>
			</div>
			<div class="row">
				<div class="cell">
					<small>Airline</small><span>${carrier[flight.carrier]}</span>
				</div>
				<div class="cell">
				</div>
			</div>
			<div class="total">
				<small>Total</small> <span>&euro;${(flight.price * peopleTotal).toFixed(2)}</span>
			</div>
		`;

		$('.ticket section').html(flightRender);
		setTimeout(() => {
			document.querySelector('.wrap').setAttribute('data-pos', 2);
		}, 50);
	});

	// Init scroll
	$(".nano").nanoScroller();


	function doFlightsRender(isInit) {
		var flightsRender = _.map(flights, function(o, i) {
			var sumText = "";
			var [from, t1, to, t2] = o.nodes[0].split(' ');

			var d1 = new Date(t1), 
				d2 = new Date(t2);

			if(!isInit) {
				var ppl = $('.radio.passengers label span'),
					sum = parseInt(ppl.eq(0).text()) + parseInt(ppl.eq(1).text()) + parseInt(ppl.eq(2).text());

				sumText = `${sum} people &euro;${(o.price * sum).toFixed(2)}`;
				from = $('.fromPlace span').text();
				to = $('.toPlace span').text();
			}

			var img;
			if(o.carrier == 'KL')
				img = 'https://dl.dropbox.com/s/02ve5kn75rpo0s3/KL.png';
			else if(o.carrier == 'BA')
				img = 'https://dl.dropbox.com/s/6fpuy898zzuk7nn/BA.png';
			else
				img = 'https://dl.dropbox.com/s/dhmufay65yer2jz/AF.png';

			return `<article data-index="${i}">
				<div class="img">
					<img src="${img}" alt="ualogo" />
				</div>
				<div class="info">
					<span class="time">${o.time}</span>
					<span class="airline">
						${d1.toLocaleTimeString().replace(':00','')} - 
						${d2.toLocaleTimeString().replace(':00','')}
					</span>
					<span>${carrier[o.carrier]} ${from} - ${to}</span>
					<span>Non-Stop</span>

					<h5><small>${sumText}</small> &euro;${o.price}</h5>
				</div>
			</article>`;
		});

		$('.list .nano-content').html(flightsRender.join(''));
	}

})();


    </script>
    </head>
    <body>
<div class="wrap" data-pos="0">
		<div class="headbar">
			<i class="zmdi zmdi-arrow-left btnBack"></i> <span>Flight Booking App</span>
		</div>
		<div class="header">
			<div class="bg"></div>
			<div class="filter"></div>
			<div class="title">
				<div class="fromPlace">
					<span>D</span><span>U</span><span>B</span>
				</div>
				<span class="separator"><i class="zmdi zmdi-airplane"></i></span>
				<div class="toPlace">
					<span>M</span><span>R</span><span>S</span>
				</div>
			</div>
			<div class="map"></div>
		</div>

		<div class="content">
			<section>
				<div class="form">
					<div class="control select">
						<div class="control-head">
							<i class="zmdi zmdi-flight-takeoff"></i>
							<span class="close"><i class="zmdi zmdi-close"></i></span>
							<div>
								<h6>From</h6>
								<span class="airport-name" data-role="from">DUB, Dublin Airport</span>
							</div>			
						</div>
						<div class="control-body">
							<ul class="select-index"></ul>
							<div class="nano">
							    <div class="nano-content">
							    	<ul class="select-data"></ul>
							    </div>
							</div>
						</div>
					</div>
					<div class="control select">
						<div class="control-head">
							<i class="zmdi zmdi-flight-land"></i>
							<span class="close"><i class="zmdi zmdi-close"></i></span>
							<div>
								<h6>To</h6>
								<span class="airport-name" data-role="to">MRS, Marseille Provence Airport</span>
							</div>			
						</div>
						<div class="control-body">
							<ul class="select-index"></ul>
							<div class="nano">
							    <div class="nano-content">
							    	<ul class="select-data"></ul>
							    </div>
							</div>
						</div>
					</div>
					<div class="control dateinput">
						<div class="control-head">
							<i class="zmdi zmdi-calendar"></i>
							<span class="close"><i class="zmdi zmdi-close"></i></span>
							<div class="control-item">
								<h6>Depar</h6>
								<span>MON, 8 May</span>
							</div>
							<div class="control-item">
								<h6>Return</h6>
								<span>One Way</span> <!--Quitar si no se selecciona-->
							</div>
						</div>
						<div class="control-body">
							<div class="info-message">
								<i class="zmdi zmdi-info"></i>
								<!-- <span>Select the depar date then the return date if you need a round trip ticket</span> -->
								<span>By the moment theres only One Way tickets, thanks.</span>
							</div>
							<div class="calendar">
								<div class="month">
									<i class="zmdi zmdi-chevron-left"></i>
									<span>May</span>
									<i class="zmdi zmdi-chevron-right"></i>
								</div>
								<div class="week">
									<span>S</span>
									<span>M</span>
									<span>T</span>
									<span>W</span>
									<span>T</span>
									<span>F</span>
									<span>S</span>
								</div>
								<div class="days"></div>
							</div>
						</div>
					</div>
					<div class="control radio passengers">
						<i class="zmdi zmdi-accounts"></i>
						<div class="control-item">
							<h6>Passengers</h6>
							<label>
								<input type="radio" name="passengers" value="0" checked="checked">
								<div><span>1</span>&times;<i class="zmdi zmdi-male-alt"></i><small>Adults</small></div>
							</label>
							<label>
								<input type="radio" name="passengers" value="1">
								<div><span>0</span>&times;<i class="zmdi zmdi-face"></i><small>Kids</small></div>
							</label>
							<label>
								<input type="radio" name="passengers" value="2">
								<div><span>0</span>&times;<i class="zmdi zmdi-walk"></i><small>Elders</small></div>
							</label>
						</div>
						<section class="spinner">
							<button data-action="plus"><i class="zmdi zmdi-plus"></i></button>
							<button data-action="minus"><i class="zmdi zmdi-minus"></i></button>
						</section>
					</div>
					<div class="control radio">
						<i class="zmdi zmdi-airline-seat-recline-extra"></i>
						<div class="control-item">
							<h6 style="margin-bottom: 8px">Class</h6>
							<label>
								<input type="radio" name="seat" value="Economy" checked="checked">
								<span>Economy</span>
							</label>
							<label>
								<input type="radio" name="seat" value="Business">
								<span>Business</span>
							</label>
							<label>
								<input type="radio" name="seat" value="First Class">
								<span>First Class</span>
							</label>
						</div>
					</div>
					<div class="control">
						<button class="btnSearch">Search Flights</button>
					</div>

				</div>
				<div class="list">
					<div class="nano">
					    <div class="nano-content">
					    		    	
					    </div>
					</div>					
				</div>
				
				<div class="ticket">
					<section>
						
					</section>
					<button class="btnBook">BOOK FLIGHT</button>
					<!-- <button class="btnHome">BACK TO HOME</button> -->
					<div class="loader">Loading...</div>
				</div>

			</section>
		</div>		
	
	</div>
    </body>
</html>