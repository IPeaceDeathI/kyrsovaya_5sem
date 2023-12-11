<body>

<div class="message"><p>Следите за нами в <a href="https://vk.com/ipeace_deathi">VK</a> или <a href="https://web.telegram.org/lPeace_Deathl">Telegram</a>!</p></div>

<div class='top-bar noselect'>

    <div class='container'>

        <div class='float-left'>
            <a href='/main' id='logo'>
                <img src='/images/logo.png' width="100px" height="100px">
            </a>
        </div>

        <div class='float-right'>
            <ul class='d-none d-lg-block'>


                <li><a href='main' class='<?php if($GLOBALS["current_path"] == "main.php") echo("active") ?>'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-car-front-fill" viewBox="0 0 16 16">
                    <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679c.033.161.049.325.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.807.807 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2ZM6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2H6ZM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17 1.247 0 3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z"/>
                </svg> Машины</a>
                </li>
                <li><a href='details' class='<?php if($GLOBALS["current_path"] == "details.php") echo("active") ?>'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tools" viewBox="0 0 16 16">
                    <path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.27 3.27a.997.997 0 0 0 1.414 0l1.586-1.586a.997.997 0 0 0 0-1.414l-3.27-3.27a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0Zm9.646 10.646a.5.5 0 0 1 .708 0l2.914 2.915a.5.5 0 0 1-.707.707l-2.915-2.914a.5.5 0 0 1 0-.708ZM3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026L3 11Z"/>
                </svg> Запчасти</a>
                </li>
                <li><a href='body_kits' class='<?php if($GLOBALS["current_path"] == "body_kits.php") echo("active") ?>' style="padding-top: 0.7rem"><img src="/images/icons8-bumper-32.png" > Обвесы</a></li>
                <li><a href='auth' class='<?php if($GLOBALS["current_path"] == "auth.php") echo('active') ?>'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg> Авторизация</a>
                </li>
            </ul>

            <ul class='d-md-block d-lg-none'>
                <div class='dropdown show'>
                    <li id='dropdownMenuButton' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><a href='#'><img src="/images/menu-burger.png"/></a></li>
                    <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                        <a class='dropdown-item' href=''>
                            Машины
                        </a>
                        <a class='dropdown-item' href='details'>
                            Запчасти
                        </a>
                        <a class='dropdown-item' href='body_kits'>
                            Обвесы
                        </a>
                        <a class='dropdown-item' href='/'>
                            Авторизация
                        </a>
                    </div>
                </div>
            </ul>
        </div>

        <div class='clearfix'></div>

    </div>

</div>