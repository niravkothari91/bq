<html>
<head>
    <style>
        html {
            background: url({{asset('img/bg-1.jpg')}}) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .parent-container {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .container {
            text-align: center;
            background-color: rgba(0, 0, 0, 0.8);
            padding: 30px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .title-text {
            color: white;
        }

        .description-text {
            color: white;
            font-size: 24px;
        }

        .golden-text {
            color: #dcb662;
        }
    </style>
</head>
<body>
<div class="parent-container">
    <div class="container">
        <img width="250" src="{{asset('img/bq_logo.png')}}"/>
        <h1 class="title-text">COMING SOON!</h1>
        <p class="description-text">We're aging like fine wine, stay tuned..<br/><br/>
            <span class="golden-text">for a more fruity and complex experience.</span></p>
    </div>
</div>
</body>
</html>
