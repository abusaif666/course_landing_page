<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>401 - Unauthorized</title>
     <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <style>
        body{
            font-family: "Fira Sans", sans-serif;
        }
        a{
            text-decoration: none
        }
        .error_page_wrapper {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .error_page_wrapper .error_page_box {
            width: 500px;
            background-color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
            padding: 40px;
            border-radius: 10px;
            gap: 10px;
        }

        .error_page_wrapper .error_page_box .error_number {
            font-size: 150px;
            font-weight: bold;
            color: #283C50;
            line-height: 120px;
        }

        .error_page_wrapper .error_page_box .error_number span {
            color: #EA4D4D;
        }

        .error_page_wrapper .error_page_box .content .error_name {
            font-weight: bold;
            font-size: 25px;
        }

        .error_page_wrapper .error_page_box .content .error_reason {
            font-size: 14px;
            margin-bottom: 10px;
        }

        .error_page_wrapper .error_page_box .error_page_home_btn .home_btn {
            display: block;
            width: 100%;
            background-color: transparent;
            border: 1px solid #283C50;
            padding: 10px;
            border-radius: 5px;
            color: black;
            font-weight: bold;
            font-size: 14px;
            text-transform: uppercase;
            transition: all linear .23s;
        }

        .error_page_wrapper .error_page_box .error_page_home_btn .home_btn:hover {
            background-color: #283C50;
            color: white;
        }
    </style>
</head>
<body>


<!-- 401 Unauthorized -->
<div class="error_page_wrapper">
    <div class="error_page_box">
        <div class="error_number">4<span>0</span>1</div>
        <div class="content">
            <div class="error_name">Unauthorized</div>
            <div class="error_reason">You are not authorized to access this page. Please login first.</div>
        </div>
        <div class="error_page_home_btn">
            <a class="home_btn" href="/">Back Home</a>
        </div>
    </div>
</div>

</body>
</html>
