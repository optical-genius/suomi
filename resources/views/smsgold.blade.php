@extends('layouts.app')
@section('title')
    Поиск и добавление слов из большого словаря
@stop




@section('content')

    <style>

        body{
            font-family: "Open Sans";
            background: #e5e5e5;
        }

        .main-center{
            padding: 20px;
            width: 850px;
            height: 100%;
            display: block;
            margin-left: auto;
            margin-right: auto;
            min-width: 850px;
        }

        .header-popup {
            display: block;
            width: 100%;
        }

        .header-popup span{
            font-size: 20px;
            font-weight: 600;
        }

        .popup-block-one {
            padding: 15px;
            display: block;
            float: left;
            width: 23%;
            background: #e4dcd6;
            margin: 20px 10px 10px 0px;
        }

        .popup-block-two {
            display: block;
            float: left;
            width: 23%;
            height: 250px;
            margin: 20px 10px 10px 0px;
        }

        .popup-block-three {
            display: block;
            float: left;
            width: 45%;
            background: white;
            margin: 5px 10px 10px 0px;
        }

        .popup-block-four {
            display: block;
            float: left;
            width: 45%;
            background: white;
            margin: 5px 10px 10px 0px;
        }

        .one-header {
            margin-bottom: 30px;
        }

        .one-header span {
            font-weight: 600;
            font-size: 16px;
        }

        .one-footer span {
            font-size: 14px;
            display: block;
            width: 60%;
            float: left;
        }

        .one-footer .arrow {
            display: block;
            float: left;
            width: 35%;
        }

        .one-footer .arrow img {
            width: 50px;
            margin-top: 7px;
            margin-left: 10px;
        }

        .two-header span {
            font-weight: 600;
            font-size: 16px;
        }

        .two-header {
            padding: 15px;
            background: #fff;
        }

        .two-header img {
            width: 150px;
            margin-top: 15px;
        }

        .two-header-text {
            font-size: 12px;
            margin-top: 15px;
        }

        .two-footer-btn {
            text-align: center;
            font-size: 13px;
            line-height: 1.36364;
            background: #E36157;
            color: #fff;
            padding: 12px 0px;
            border-radius: 7px;
            margin-top: 15px;
        }

        .old-platform {
            display: block;
            float: left;
            width: 50%;
            height: 250px;
            margin: 20px 10px 10px 0px;
        }

        .old-platform-header {
            padding: 15px 0px 0px 0px;
        }

        .old-platform-header span {
            font-weight: 600;
            font-size: 16px;
        }

        .popup-block-three img {
            width: 150px;
            margin-top: 10px;
            margin-left: 15px;
            margin-bottom: 10px;
        }

        .three-footer-btn {
            text-align: center;
            font-size: 13px;
            line-height: 1.36364;
            color: #E36157;
            padding: 12px 0px;
            border: 1px solid #E36157;
            border-radius: 7px;
            width: 80%;
            margin: 0 auto;
        }

        .three-footer-text {
            font-size: 12px;
            margin-top: 0px;
            padding: 9px;
        }

        .popup-block-four img {
            width: 150px;
            margin-top: 10px;
            margin-left: 15px;
            margin-bottom: 10px;
        }

        .four-footer-text {
            font-size: 12px;
            margin-top: 17px;
            padding: 9px;
        }

    </style>





    <div class="modal" id="lkLink" style="min-width: 850px; min-height: 500px; background: #f0f5fb;">
<div class="main-center">

    <div class="header-popup">
        <span>Вход в личный кабинет</span>
    </div>


    <div class="popup-block-one">
        <div class="one-header">
            <span>С 15 мая 2019 года действует новая платформа</span>
        </div>

        <div class="one-footer">
            <span>Выберите период регистрации</span>
            <div class="arrow">
                <img src="/local/templates/smsgold_main/images/right-arrow.png" alt="">
            </div>
        </div>
    </div>


    <div class="popup-block-two">
        <div class="two-header">
            <span>Новая платформа</span>
            <img src="/local/templates/smsgold_main/images/techno2.jpg" alt="">
            <div class="two-header-text">
                Регистрация после <b>15 мая 2019</b> года
            </div>
        </div>

        <a href="https://lk.smsgold.ru/login"><div class="two-footer-btn">В новый кабинет</div></a>
    </div>

    <div class="old-platform">

        <div class="old-platform-header">
            <span>Старая платформа</span>
        </div>

        <div class="popup-block-three">
            <img src="/local/templates/smsgold_main/images/techno2.jpg" alt="">
            <a href="https://web.smsgold.ru/login"><div class="three-footer-btn">В старый кабинет</div></a>
            <div class="three-footer-text">Регистрация с <b>1 июня 2016</b> года до <b>30 апреля 2019</b> года</div>
        </div>


        <div class="popup-block-four">
            <img src="/local/templates/smsgold_main/images/techno1.jpg" alt="">
            <a href="https://gt.smsgold.ru/ru/cabinet.html"><div class="three-footer-btn">В старый кабинет</div></a>
            <div class="four-footer-text">Регистрация до <b>31 мая 2016</b> года</div>
        </div>

    </div>

</div>
    </div>
@endsection




















<!--

style="min-width: 850px; min-height: 500px; background: #f0f5fb;"




<div class="modal" id="lkLink" >
    <div class="form">
        <div class="modal_form_images" style="margin: 10px">
            <div class="form__caption">
                <div class="form__title">Вход в личный кабинет.</div>
                <div class="form__subtitle">Когда вы зарегистрировались?</div>
            </div>

            <div class="modal_form_images_enter" style="display: block; width: 100%; float: left; padding: 10px;">
                <div class="new_platform"><img data-src="/local/templates/smsgold_main/images/new_platform_test.png" class="lazyload" style="width: 45px; position: absolute; margin-top: -23px; margin-left: -16px; transform: rotate(-33deg); z-index: 999;"></div>
                <a  class="btn" style="background-color: #FFC107; color: #2a2a2a; font-size: 16px; padding: 15px 20px; width: 100%; margin-top: -20px;"  href="https://lk.smsgold.ru/">Регистрация с <b>15 мая 2019 года - новая платформа</b></a>
            </div>


            <div class="modal_form_images_enter" style="display: block; width: 49%; float: left; padding: 10px;">
                <div class="form__controls">
                    <a href="https://gt.smsgold.ru/ru/cabinet.html"><img data-src="/local/templates/smsgold_main/images/techno1.jpg" class="lazyload" width="100%"></a>
                </div>
                <a class="btn" href="https://gt.smsgold.ru/ru/cabinet.html" style="font-size: 14px; padding: 15px 20px; margin-top: -20px;">Регистрация до <b>31 мая 2016</b> года</a>
            </div>

            <div class="modal_form_images_enter" style="display: block; width: 49%; float: left; padding: 10px;">
                <div class="form__controls">
                    <a href="https://web.smsgold.ru/login"><img data-src="/local/templates/smsgold_main/images/techno2.jpg" class="lazyload" width="100%"></a>
                </div>
                <a  class="btn" href="https://web.smsgold.ru/login" style="font-size: 14px; padding: 15px 20px; margin-top: -20px;">Регистрация с <b>1 июня 2016 до 30 апреля 2019</b> года</a>
            </div>



        </div>
    </div>
</div>
-->