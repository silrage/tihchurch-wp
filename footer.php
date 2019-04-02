<!-- footer -->
<footer>
    <div class="container">
        <div class="">
            <div class="row space-vert2">
                <div class="col-5 col-td-6">
                    <div class="site-title">
                        <h4><?php bloginfo('name'); ?></h4>
                    </div>
                    <div class="site-desc space-bottom">
                        <p class="site-text-p3"><?php bloginfo('description'); ?></p>
                    </div>
                    <div class="site-contacts">
                        <p class="site-text-p3"><?php
                            $other_page = 39;
                            the_field('addres', $other_page); ?></p>
                        <p class="site-text-p3"><?php the_field('phone', $other_page); ?></p>

                        <p class="site-text-p3"><a href="mailto:<?php the_field('email', $other_page); ?>">
                                <?php the_field('email', $other_page); ?>
                            </a></p>
                    </div>
                </div>
                <div class="col-7 col-td-6">
                    <ul class="site-social space-top2">
                        <li><a href="http://" target="_blank" rel="noopener noreferrer">VK</a></li>
                        <li><a href="http://" target="_blank" rel="noopener noreferrer">Insta</a></li>
                        <li><a href="http://" target="_blank" rel="noopener noreferrer">YouTube</a></li>
                        <li><a href="http://" target="_blank" rel="noopener noreferrer">RuTube</a></li>
                        <li><a href="http://" target="_blank" rel="noopener noreferrer">Facebook</a></li>
                        <li><a href="http://" target="_blank" rel="noopener noreferrer">OK</a></li>
                        <li><a href="http://" target="_blank" rel="noopener noreferrer">Twitter</a></li>
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
    let div = document.createElement('div');
    div.id = "allsearch";

    if (allData.length) {
      allData.forEach((el) => {
        div.innerHTML = div.innerHTML + `<div><a href="${el.link}">${el.title.rendered}</a><span>${el.excerpt.rendered}</span></div>`;
      });
    }

    allsearch.replaceWith(div);
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
