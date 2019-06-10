<!-- footer -->
<footer>
  <div class="container">
    <div class="">
      <div class="row space-vert2">
        <div class="col-5 col-td-6">
          <div class="site-title">
            <h4><?php
                $lang = pll_current_language();
                if($lang === 'ru'){
                    $other_page = 39;
                } else {
                    $other_page = 96;
                }

                the_field('name', $other_page);

                ?></h4>
          </div>
          <div class="site-desc space-bottom">
            <p class="site-text-p3"><?php the_field('description', $other_page); ?></p>
          </div>
          <div class="site-contacts">
            <p class="site-text-p3"><?php the_field('addres', $other_page); ?></p>
            <p class="site-text-p3"><?php the_field('phone', $other_page); ?></p>

            <p class="site-text-p3"><a href="mailto:<?php the_field('email', $other_page); ?>">
                    <?php the_field('email', $other_page); ?>
              </a></p>
          </div>
        </div>
        <div class="col-7 col-td-6">
          <ul class="site-social space-top2">
            <!-- <li><a href="http://vk.com" target="_blank" rel="noopener noreferrer">VK</a></li> -->
            <li>
              <a href="http://instagram.com/tihchurch" target="_blank" rel="noopener noreferrer">
                <svg class="site-social__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 169.063 169.063">
                  <path d="M122.406,0H46.654C20.929,0,0,20.93,0,46.655v75.752c0,25.726,20.929,46.655,46.654,46.655h75.752
                    c25.727,0,46.656-20.93,46.656-46.655V46.655C169.063,20.93,148.133,0,122.406,0z M154.063,122.407
                    c0,17.455-14.201,31.655-31.656,31.655H46.654C29.2,154.063,15,139.862,15,122.407V46.655C15,29.201,29.2,15,46.654,15h75.752
                    c17.455,0,31.656,14.201,31.656,31.655V122.407z"/>
                  <path d="M84.531,40.97c-24.021,0-43.563,19.542-43.563,43.563c0,24.02,19.542,43.561,43.563,43.561s43.563-19.541,43.563-43.561
                    C128.094,60.512,108.552,40.97,84.531,40.97z M84.531,113.093c-15.749,0-28.563-12.812-28.563-28.561
                    c0-15.75,12.813-28.563,28.563-28.563s28.563,12.813,28.563,28.563C113.094,100.281,100.28,113.093,84.531,113.093z"/>
                  <path d="M129.921,28.251c-2.89,0-5.729,1.17-7.77,3.22c-2.051,2.04-3.23,4.88-3.23,7.78c0,2.891,1.18,5.73,3.23,7.78
                    c2.04,2.04,4.88,3.22,7.77,3.22c2.9,0,5.73-1.18,7.78-3.22c2.05-2.05,3.22-4.89,3.22-7.78c0-2.9-1.17-5.74-3.22-7.78
                    C135.661,29.421,132.821,28.251,129.921,28.251z"/>
                </svg>
              </a>
            </li>
            <!-- <li><a href="http://youtube.com" target="_blank" rel="noopener noreferrer">YouTube</a></li>
            <li><a href="http://rutube.ru" target="_blank" rel="noopener noreferrer">RuTube</a></li>
            <li><a href="http://fb.com" target="_blank" rel="noopener noreferrer">Facebook</a></li>
            <li><a href="http://ok.ru" target="_blank" rel="noopener noreferrer">OK</a></li>
            <li><a href="http://twitter.com" target="_blank" rel="noopener noreferrer">Twitter</a></li> -->
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- /footer -->
<!-- site-main -->
</div>
<!-- site-page-content -->
</main>
<!-- /wrapper -->

<?php wp_footer(); ?>

<!-- other -->
<script>
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

    var head = document.getElementsByTagName('head').item(0);
    var scriptTag = document.getElementById('loadScript');
    if(scriptTag) head.removeChild(scriptTag);
    script = document.createElement('script');
    script.src = "http://script.pravoslavie.ru/icon.php?advanced=2&tmshift="+tmshift;
    script.type = 'text/javascript';
    script.id = 'dayiconscript'+tmshift;
    head.appendChild(script);


    // свойству src вновь созданного элемента присваиваем адрес скрипта с параметрами.
    // параметр tmshift=0 для сегодняшнего дня, 24 - для завтрашнего и тд.
    // подготавливаем tmshift для перехода к следующему дню
    tmshift+=24;
    /////////////////////////////
    /// Необязательные действия.
    /// Поскольку данные от скрипта поступают не мгновенно,
    /// во время ожидания ответа от скрипта можно попросить читателя подождать
    document.getElementById('iconPlace').innerHTML="Подождите";
    document.getElementById('iconTextPlace').innerHTML="немного";
    document.getElementById('iconDayPlace').innerHTML="...";
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
    document.getElementById('iconPlace').innerHTML="<a href='javascript:loadscript()'><IMG SRC='"+dayicon.src+"' WIDTH="+dayicon.w+" HEIGHT="+dayicon.h+" ALT='"+dayicon.text+"' class='sidebar-widget__image'></a>";
    // рисуем подпись
    document.getElementById('iconTextPlace').innerHTML="<strong>"+dayicon.text+"</strong>"
    // вычисляем адрес в формате yyyymmdd для ссылки на страничку дня
    var ymd=Number(dayicon.year)*10000+Number(dayicon.monthold)*100+Number(dayicon.dayold);
    // рисуем название дня и ссылку
    document.getElementById('iconDayPlace').innerHTML=dayicon.day;
    //alert(Dump(dayicon)); //раскомментируйте эту строчку, чтобы посмотреть данные, передаваемые скриптом
  }

  ///////////////////////////////////////////////////////////////////////////////////////
  /////////////// Эта функция не требуется для работы скрипта  //////////////////////////
  /////////////// Её удобно использовать для исследования данных, ///////////////////////
  /////////////// передаваемых скриптом. Пример: alert(Dump(dayicon)); /////////////////
  ///////////////////////////////////////////////////////////////////////////////////////
  function Dump(d,l)
  {
    if (l == null) l = 1;
    var s = '';
    if (typeof(d) == "object")
    {
      s += typeof(d) + " {\n";
      for (var k in d)
      {
        for (var i=0; i<l; i++) s += "  ";
        if(typeof(d[k])!="function")
          s += k+": " + Dump(d[k],l+1);
      }
      for (var i=0; i<l-1; i++) s += "  ";
      s += "}\n"
    }
    else
    {
      s += "" + d + "\n";
    }
    return s;
  }
  bodyOnload();




  ///поиск
  document.getElementById('search').addEventListener("input", function () {
    if (this.value.length > 3) {
      return throttle(getSearchPosts(this.value));
    }
    setResult('')

  });

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
    var finded = false;
    var wrap = document.createElement('DIV');
    var list = document.createElement('UL');
    wrap.className = "site-search__result-wrap";
    wrap.appendChild(list);

    if (allData.length) {
      finded = true;
      allData.forEach((el) => {
        list.innerHTML = list.innerHTML + `<li><a href="${el.link}">${el.title.rendered}</a><p>${el.excerpt.rendered}</p></li>`;
      });
    }

    var result = document.getElementById('allsearch');
    result.innerHTML = '';
    if (finded) {
      result.appendChild(wrap);
      result.classList.add('is-opened');
    } else {
      result.classList.remove('is-opened');
    }
  }

  function throttle(callback) {

    let wait = false;
    return function () {
      if (!wait) {

        callback.apply(null, arguments);
        wait = true;
        setTimeout(function () {
          wait = false;
        }, 1000);
      }
    }
  }
</script>

</body>
</html>
