(function () {
	window.isTouchDevice="undefined"!=typeof window&&"ontouchstart"in window;
	/**
	 * Скрипт для основного меню
	 */
	var menu=document.getElementById('siteMenu'),
			menuView=document.getElementById('siteMenuView'),
			menuLinksSelector='.site-tabs__wrapper > .menu-item > a',
			subMenuSelector='.sub-menu',
			subMenuLinkSelector=subMenuSelector+' > .menu-item > a',
			burgerOpenedClass='burger-menu-shown';
	if (!menu || !menuView) return;
	if (window.innerWidth >=768){
		var links=menu.querySelectorAll(menuLinksSelector);
		void [].forEach.call(links, function(link, key){
			var parent=link.parentElement,
					childs=parent.querySelector(subMenuSelector);
			if (childs)
				link.addEventListener('mousemove', function(e){menuLinkShow(parent,childs)}, { passive: true })
		});
		function menuLinkShow (parentLink,childs){
			if (parentLink.className.indexOf('shown') > 0) return false;
			parentLink.classList.add('shown');
			menuView.innerHTML=null;
			// Конвертируем дочерние ссылки, с целью сбора обновленных извне DOM-элементов
			var childsEl=document.createElement('DIV');
				childsEl.className='site-menu__childs';
			void [].forEach.call(childs.children, function(ch, key){
				var chLink=document.createElement('A'),
						link=ch.querySelector('a');
				chLink.className='site-menu__childs-link';
				chLink.href=link.href;
				chLink.innerHTML=link.innerHTML;
				childsEl.appendChild(chLink);
			});
			childsEl.style.left=parentLink.getBoundingClientRect().left+'px';
			menuView.appendChild(childsEl);
			mc({
				duration: 777,
				timing: easeInOut(3),
				draw: function(progress){
					menuView.style.minHeight=parseInt(0 + (childsEl.clientHeight - 0) * progress) + 'px'
				},
				onLeave: function(){}
			})
			function closeListener (e){
				if (e.target !==parentLink && e.target !==childsEl && !parentLink.contains(e.target) && !childsEl.contains(e.target)){
					menuView.style.minHeight=null;
					menuView.innerHTML=null;
					parentLink.classList.remove('shown');
					window.removeEventListener('mouseover', closeListener);
				}
			}
			window.addEventListener('mouseover', closeListener, { passive: true });
		}
	}else{
		// Активируем копию меню, клик по бургеру
		var burger=document.getElementById('burgerMenu');
		if (burger){
			function generateBurgerLinks(){
				var links=menu.querySelectorAll(menuLinksSelector),
						wrapLink=function(link){
					var wrap=document.createElement('DIV'),
							chLink=document.createElement('A');
					wrap.className='burger-menu__link';
					chLink.href=link.href;
					chLink.innerHTML=link.innerHTML;
					wrap.appendChild(chLink);
					children=link.parentElement.querySelector(subMenuSelector);
					if(children){
						var wrapSubLinks=document.createElement('DIV');
						wrapSubLinks.className='burger-menu__sub-links';
						void [].forEach.call(children.querySelectorAll(subMenuLinkSelector), function(ch){ wrapSubLinks.appendChild(wrapLink(ch)); });
						wrap.appendChild(wrapSubLinks);
					}
					return wrap;
				};

				menuView.innerHTML=null;
				var childsEl=document.createElement('DIV'),
						overlayEl=document.createElement('DIV');
				childsEl.className='burger-menu__childs';
				overlayEl.className='burger-menu__overlay';
				void [].forEach.call(links, function(link){ childsEl.appendChild(wrapLink(link)); });
				menuView.appendChild(childsEl);
				menuView.appendChild(overlayEl);
				overlayEl.addEventListener('click',toggleBurgerMenu);
			}
			function toggleBurgerMenu(e){
				menuView.classList.toggle(burgerOpenedClass);
				var isOpened=menuView.classList.contains(burgerOpenedClass),
				from=isOpened?-100:0,
				to=isOpened?0:-100;
				(isOpened) ? disableBodyScroll() : enableBodyScroll()
				mc({
					duration: 777,
					timing: easeInOut(3),
					draw: function(progress){
						menuView.style.left=parseInt(from+(to-from)*progress)+'%'
					},
					onLeave: function(){}
				})
			}
			generateBurgerLinks();
			burger.addEventListener('click',toggleBurgerMenu);
		}
	}

	/* Покадровая анимация для метода mc */
	var easeIn=function(power) { return function(t) { return Math.pow(t, power) }}
	var easeOut=function(power) { return function(t) { return 1 - Math.abs(Math.pow(t - 1, power)) }}
	var easeInOut=function(power) { return function(t) { return t < 0.5 ? easeIn(power)(t * 2) / 2 : easeOut(power)(t * 2 - 1) / 2 + 0.5 }}
	function mc(opt) {
		var requestId,
				fps=60,
				fpsInterval=1000 / fps,
				lastDrawTime=performance.now(),
				startTime,
				animate=function (timestamp) {
			requestId=window.requestAnimationFrame(animate)
			var timeElapsed=timestamp - lastDrawTime
			if (timeElapsed > fpsInterval) {
				lastDrawTime=timestamp - (timeElapsed % fpsInterval)
				startTime=startTime || timestamp
				var timeElapsedSinceStart=timestamp - startTime
				var progress=timeElapsedSinceStart / opt.duration
				var safeProgress=Math.min(progress.toFixed(2), 1)
				if (safeProgress===1) {
					opt.draw(opt.timing(1))
					window.cancelAnimationFrame(requestId)
					requestId=null
					opt.onLeave()
				} else {
					opt.draw(opt.timing(safeProgress))
				}
			}
		}
		animate();
	}
})();

function disableBodyScroll(){
	var html=document.getElementsByTagName('html');
	html[0].style.width='100vw';
	html[0].style.overflow='hidden';
}
function enableBodyScroll(){
	var html=document.getElementsByTagName('html');
	html[0].style.width=null;
	html[0].style.overflow=null;
}

var tmshift=0; // Временной сдвиг от текущей даты. К этой переменной будем добавлять 24, чтобы переходить на икону следующего дня.
function bodyOnload()
{
	// Эта функция автоматически вызывается при окончании загрузки страницы
	// настройка такого  её поведения делается в теге body.  См. ниже - <body onload='bodyOnload()'>
	// Итак, страничка загрузилась
	loadscript(); // загружаем скрипт
}
////////////////////////////////////////////////////////////////////////////////////
////////////// функция подключения скрипта /////////////////////////////////////////
////////////// вызывается каждый раз, когда надо получить новую икону //////////////
////////////////////////////////////////////////////////////////////////////////////
function loadscript()
{
	// создаем новый элемент - script с уникальным id

	var head=document.getElementsByTagName('head').item(0);
	var scriptTag=document.getElementById('loadScript');
	if(scriptTag) head.removeChild(scriptTag);
	script=document.createElement('script');
	script.src="http://script.pravoslavie.ru/icon.php?advanced=2&tmshift="+tmshift;
	script.type='text/javascript';
	script.id='dayiconscript'+tmshift;
	head.appendChild(script);


	// свойству src вновь созданного элемента присваиваем адрес скрипта с параметрами.
	// параметр tmshift=0 для сегодняшнего дня, 24 - для завтрашнего и тд.
	// подготавливаем tmshift для перехода к следующему дню
	tmshift+=24;
	/////////////////////////////
	/// Необязательные действия.
	/// Поскольку данные от скрипта поступают не мгновенно,
	/// во время ожидания ответа от скрипта можно попросить читателя подождать
	var iconPlace=document.getElementById('iconPlace'),
			iconTextPlace=document.getElementById('iconTextPlace'),
			iconDayPlace=document.getElementById('iconDayPlace');
	if (iconPlace) iconPlace.innerHTML="Подождите";
	if (iconTextPlace) iconTextPlace.innerHTML="немного";
	if (iconDayPlace) iconDayPlace.innerHTML="...";
}
///////////////////////////////////////////////////////////////////////////////////
/////////////// функция вывода иконы на экран /////////////////////////////////////
/////////////// вызывается автоматически, когда данные скрипта будут готовы ///////
/////////////// Имя функции менять нельзя.        /////////////////////////////////
/////////////// Код функкции может быть любой, какой вам требуется ////////////////
///////////////////////////////////////////////////////////////////////////////////
function dayiconloaded()
{
	// К моменту автоматического вызова этой функции создается глобальный объект dayicon
	// Через свойства этого объекта можно получить все данные, передаваемые скриптом
	// Эти данные можно использовать любым способом.
	// Мы, для примера, будем выводить икону, подпись и дату со ссылкой на страничку дня календаря
	// Рисуем икону
	// В предварительно размещенный на странице(см. ниже) элемент с id=iconPlace помещаем элемент IMG, составленный из данных объекта dayicon
	// Элемент IMG помещается в элемент A, где гиперссылкой является функция loadscript. Это сделано, чтобы при нажатии на изображение
	// происходила повторная загрузка скрипта с новыми параметрами, соответствующими следующему дню.
	var iconPlace=document.getElementById('iconPlace'),
			iconTextPlace=document.getElementById('iconTextPlace'),
			iconDayPlace=document.getElementById('iconDayPlace');

	if (iconPlace) iconPlace.innerHTML="<a href='javascript:loadscript()'><IMG SRC='"+dayicon.src+"' WIDTH="+dayicon.w+" HEIGHT="+dayicon.h+" ALT='"+dayicon.text+"' class='sidebar-widget__image'></a>";
	// рисуем подпись
	if (iconTextPlace) iconTextPlace.innerHTML="<strong>"+dayicon.text+"</strong>"
	// вычисляем адрес в формате yyyymmdd для ссылки на страничку дня
	var ymd=Number(dayicon.year)*10000+Number(dayicon.monthold)*100+Number(dayicon.dayold);
	// рисуем название дня и ссылку
	if (iconDayPlace) iconDayPlace.innerHTML=dayicon.day;
	//alert(Dump(dayicon)); //раскомментируйте эту строчку, чтобы посмотреть данные, передаваемые скриптом
}

///////////////////////////////////////////////////////////////////////////////////////
/////////////// Эта функция не требуется для работы скрипта  //////////////////////////
/////////////// Её удобно использовать для исследования данных, ///////////////////////
/////////////// передаваемых скриптом. Пример: alert(Dump(dayicon)); /////////////////
///////////////////////////////////////////////////////////////////////////////////////
function Dump(d,l)
{
	if (l==null) l=1;
	var s='';
	if (typeof(d)=="object")
	{
		s +=typeof(d) + " {\n";
		for (var k in d)
		{
			for (var i=0; i<l; i++) s +="  ";
			if(typeof(d[k])!="function")
				s +=k+": " + Dump(d[k],l+1);
		}
		for (var i=0; i<l-1; i++) s +="  ";
		s +="}\n"
	}
	else
	{
		s +="" + d + "\n";
	}
	return s;
}
bodyOnload();




///поиск
var search = document.getElementById('search');
if (search) {
	search.addEventListener("input", function () {
		if (this.value.length > 3)
			return throttle(getSearchPosts(this.value));
		setResult('')
	});
}

function getSearchPosts(search) {
	fetch(`/wp-json/wp/v2/posts?search=${search}`)
		.then(function (response) {
			return response.json();
		})
		.then(function (response) {
			getSearchPages(search, response);
		})
		.catch(alert);
}

function getSearchPages(search, data) {
	fetch(`/wp-json/wp/v2/pages?search=${search}`)
		.then(function (response) {
			return response.json();
		})
		.then(function (response) {
			setResult(response.concat(data));
		})
		.catch(alert);
}

function setResult(allData) {
	console.log(allData)
	var finded=false;
	var wrap=document.createElement('DIV');
	var list=document.createElement('UL');
	wrap.className="site-search__result-wrap";
	wrap.appendChild(list);

	if (allData.length) {
		finded=true;
		allData.forEach((el)=> {
			list.innerHTML=list.innerHTML + `<li><a href="${el.link}">${el.title.rendered}</a><p>${el.excerpt.rendered}</p></li>`;
		});
	}

	var result=document.getElementById('allsearch');
	result.innerHTML='';
	if (finded) {
		result.appendChild(wrap);
		result.classList.add('is-opened');
	} else {
		result.classList.remove('is-opened');
	}
}

function throttle(callback) {

	let wait=false;
	return function () {
		if (!wait) {

			callback.apply(null, arguments);
			wait=true;
			setTimeout(function () {
				wait=false;
			}, 1000);
		}
	}
}
