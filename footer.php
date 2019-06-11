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

        <?php
          // Array icons
          $social = [
            'vk'=>[
              'viewBox'=>'0 0 512 512',
              'paths'=>'<path d="M440.649,295.361c16.984,16.582,34.909,32.182,50.142,50.436
              c6.729,8.112,13.099,16.482,17.973,25.896c6.906,13.382,0.651,28.108-11.348,28.907l-74.59-0.034
              c-19.238,1.596-34.585-6.148-47.489-19.302c-10.327-10.519-19.891-21.714-29.821-32.588c-4.071-4.444-8.332-8.626-13.422-11.932
              c-10.182-6.609-19.021-4.586-24.84,6.034c-5.926,10.802-7.271,22.762-7.853,34.8c-0.799,17.564-6.108,22.182-23.751,22.986
              c-37.705,1.778-73.489-3.926-106.732-22.947c-29.308-16.768-52.034-40.441-71.816-67.24
              C58.589,258.194,29.094,200.852,2.586,141.904c-5.967-13.281-1.603-20.41,13.051-20.663c24.333-0.473,48.663-0.439,73.025-0.034
              c9.89,0.145,16.437,5.817,20.256,15.16c13.165,32.371,29.274,63.169,49.494,91.716c5.385,7.6,10.876,15.201,18.694,20.55
              c8.65,5.923,15.236,3.96,19.305-5.676c2.582-6.11,3.713-12.691,4.295-19.234c1.928-22.513,2.182-44.988-1.199-67.422
              c-2.076-14.001-9.962-23.065-23.933-25.714c-7.129-1.351-6.068-4.004-2.616-8.073c5.995-7.018,11.634-11.387,22.875-11.387h84.298
              c13.271,2.619,16.218,8.581,18.035,21.934l0.072,93.637c-0.145,5.169,2.582,20.51,11.893,23.931
              c7.452,2.436,12.364-3.526,16.836-8.251c20.183-21.421,34.588-46.737,47.457-72.951c5.711-11.527,10.622-23.497,15.381-35.458
              c3.526-8.875,9.059-13.242,19.056-13.049l81.132,0.072c2.406,0,4.84,0.035,7.17,0.434c13.671,2.33,17.418,8.211,13.195,21.561
              c-6.653,20.945-19.598,38.4-32.255,55.935c-13.53,18.721-28.001,36.802-41.418,55.634
              C424.357,271.756,425.336,280.424,440.649,295.361L440.649,295.361z"/>'
            ],
            'insta'=>[
              'viewBox'=>'0 0 169.063 169.063',
              'paths'=>'<path d="M122.406,0H46.654C20.929,0,0,20.93,0,46.655v75.752c0,25.726,20.929,46.655,46.654,46.655h75.752
              c25.727,0,46.656-20.93,46.656-46.655V46.655C169.063,20.93,148.133,0,122.406,0z M154.063,122.407
              c0,17.455-14.201,31.655-31.656,31.655H46.654C29.2,154.063,15,139.862,15,122.407V46.655C15,29.201,29.2,15,46.654,15h75.752
              c17.455,0,31.656,14.201,31.656,31.655V122.407z"/> <path d="M84.531,40.97c-24.021,0-43.563,19.542-43.563,43.563c0,24.02,19.542,43.561,43.563,43.561s43.563-19.541,43.563-43.561
              C128.094,60.512,108.552,40.97,84.531,40.97z M84.531,113.093c-15.749,0-28.563-12.812-28.563-28.561
              c0-15.75,12.813-28.563,28.563-28.563s28.563,12.813,28.563,28.563C113.094,100.281,100.28,113.093,84.531,113.093z"/> <path d="M129.921,28.251c-2.89,0-5.729,1.17-7.77,3.22c-2.051,2.04-3.23,4.88-3.23,7.78c0,2.891,1.18,5.73,3.23,7.78
              c2.04,2.04,4.88,3.22,7.77,3.22c2.9,0,5.73-1.18,7.78-3.22c2.05-2.05,3.22-4.89,3.22-7.78c0-2.9-1.17-5.74-3.22-7.78
              C135.661,29.421,132.821,28.251,129.921,28.251z"/>'
            ],
            'you'=>[
              'viewBox'=>'0 0 512 512',
              'paths'=>'<path d="M490.24,113.92c-13.888-24.704-28.96-29.248-59.648-30.976C399.936,80.864,322.848,80,256.064,80
              c-66.912,0-144.032,0.864-174.656,2.912c-30.624,1.76-45.728,6.272-59.744,31.008C7.36,138.592,0,181.088,0,255.904
              C0,255.968,0,256,0,256c0,0.064,0,0.096,0,0.096v0.064c0,74.496,7.36,117.312,21.664,141.728
              c14.016,24.704,29.088,29.184,59.712,31.264C112.032,430.944,189.152,432,256.064,432c66.784,0,143.872-1.056,174.56-2.816
              c30.688-2.08,45.76-6.56,59.648-31.264C504.704,373.504,512,330.688,512,256.192c0,0,0-0.096,0-0.16c0,0,0-0.064,0-0.096
              C512,181.088,504.704,138.592,490.24,113.92z M192,352V160l160,96L192,352z"/>'
            ],
            'rutube'=>[],
            'fb'=>[
              'viewBox'=>'0 0 512 512',
              'paths'=>'<path d="m437 0h-362c-41.351562 0-75 33.648438-75 75v362c0 41.351562 33.648438 75 75 75h151v-181h-60v-90h60v-61c0-49.628906 40.371094-90 90-90h91v90h-91v61h91l-15 90h-76v181h121c41.351562 0 75-33.648438 75-75v-362c0-41.351562-33.648438-75-75-75zm0 0"/>'
            ],
            'ok'=>[],
            'tw'=>[]
          ];

          // Generate links
          foreach ($social as $socKey => $socLink) {
            if (get_theme_mod('social_'.$socKey)) {
              $social[$socKey]['link'] = get_theme_mod('social_'.$socKey);
            }
          }
          if (count($social) > 0):
        ?>
        <div class="col-7 col-td-6">
          <ul class="site-social space-top2">
            <?php
              foreach ($social as $socKey => $socLink):
                if (!empty($socLink['link'])):
            ?>
            <li>
              <a
                href="<?=$socLink['link'];?>"
                target="_blank"
                rel="noopener noreferrer"
              >
                <svg
                  class="site-social__icon"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="<?=$socLink['viewBox'];?>"
                >
                  <?=$socLink['paths'];?>
                </svg>
              </a>
            </li>
            <?php
                endif;
              endforeach;
            ?>
          </ul>
        </div>
        <?php
          endif;
        ?>
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
