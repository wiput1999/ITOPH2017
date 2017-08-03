<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IT Ladkrabang Open House 2017</title>
    <meta property="og:image" content="{{URL('/og.png')}}">
    <link rel="shortcut icon" href="{{URL('/favicon.ico')}}" type="image/x-icon"/>
    @include('layout.css')
    <link rel="stylesheet" href="{{URL('/assets/css/counter.css')}}">
</head>

<body>
    <section id="counter-section">
        <div class="container">
            <div class="counter text-center">
                <div class="logo">
                    <img src="{{URL('/assets/images/logo.svg')}}" alt="">
                </div>
                <h2>จำนวนผู้เข้ารว่มงาน</h2>
                <h1 id="total">Loading...</h1>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        const url = "https://openhouse.it.kmitl.ac.th/2017/api/checkin"
        const total = document.getElementById('total')
        const guest = document.getElementById('guest')
        const student = document.getElementById('student')
        const school = document.getElementById('school')
        setInterval(() => {
            fetch(url).then((res) => res.json()).then((data) => {
                total.innerText = `${data.total} คน`
                guest.innerText = data.guest
                student.innerText = data.student
                school.innerText = data.school
            }).catch((e) => {
                console.log(e)
            })
        }, 1500)
    </script>
</body>

</html>