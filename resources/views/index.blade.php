@extends('layout.partial')
@section('content')
    <!-- Main component for a primary marketing message or call to action -->
    <section id="section1">
        <div class="container">
            <div class="logo">
                <img src="{{URL('/assets/images/logo.svg')}}" alt="">
            </div>
            <div class="time-date">
                <h2 class="text-center">1 กันยายน 2560</h2>
                <h2 class="text-center">เวลา 09.00 - 16.30 น.</h2>
            </div>

            <div class="jumbobuttons text-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-blue btn-jumbo btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ลงทะเบียนเข้าชม</button>
                    <ul class="register-dropdown dropdown-menu" style="top: 70px; border-radius:10px;">
                        <li><a href="{{URL('/register/guest_student')}}">นักเรียน/นักศึกษา</a></li>
                        <li><a href="{{URL('/register/guest_school')}}">โรงเรียน</a></li>
                        <li><a href="{{URL('/register/guest')}}">บุคคลทั่วไป</a></li>
                    </ul>
                </div>

                <a href="#section4" class="btn btn-org btn-jumbo">สมัครแข่งขัน</a>

            </div>



        </div>
    </section>


    <section id="section2">
        <div class="container">
            <div class="intro-gallery">
                <div class="gallery-item owl-carousel owl-theme">
                    <img class="hilight-img owl-lazy" data-src="{{URL('/assets/images/OPH2016/highlight-1.png')}}" alt="">
                    <img class="hilight-img owl-lazy" data-src="{{URL('/assets/images/OPH2016/highlight-2.png')}}" alt="">
                    <img class="hilight-img owl-lazy" data-src="{{URL('/assets/images/OPH2016/highlight-3.png')}}" alt="">
                    <img class="hilight-img owl-lazy" data-src="{{URL('/assets/images/OPH2016/highlight-4.png')}}" alt="">

                </div>

                <script>
                    $('.owl-carousel').owlCarousel({
                        items: 4,
                        lazyLoad: true,
                        margin: 10,
                        responsiveClass: true,
                        responsive: {
                            0: {
                                items: 1,
                            },
                            1024: {
                                items: 4,
                            },
                        }
                    });
                </script>
            </div>
            <div class="intro">
                <div class="intro-word animated">
                    <div class="title">
                        <h1>เลือกเรียน เปลี่ยนชีวิต
                            <div class="under-line blue-bg-color">
                            </div>
                        </h1>
                    </div>
                    <p> สัมผัสเส้นทางการศึกษาทางด้านไอทีในทุกแง่มุม เปิดตัวหลักสูตรใหม่ ป.ตรี บรรยายพิเศษจากเน็ตไอดอลและกูรูไอทีจากเว็บไซต์เด็กดี
                        ร่วมสนุกและลุ้นไปกับเกมการแข่งขันมากมาย สร้างแรงบันดาลใจไปกับนิทรรศการผลงานสุดเจ๋งของนักศึกษา ทดลองเรียนจริง
                        และอีกมากมาย
                    </p>

                    <a class="btn btn-org btn-jumbo" href="{{URL('/schedule')}}" style="margin-top: 30px;">กำหนดการ</a>
                    <div class="qouet">
                        <span>"</span>
                    </div>

                    <div class="qouet-2">
                        <span>"</span>
                    </div>
                </div>

                <!--<div class="img-parallax img-parallax-1">
                    <ul>
                        <li class="img-parallax-1"><img src="images/it-kmitl/1.jpg" alt=""></li>
                        <li class="img-parallax-2"><img src="images/it-kmitl/2.jpg" alt=""></li>
                        <li class="img-parallax-3"><img src="images/it-kmitl/3.jpg" alt=""></li>
                        <li class="img-parallax-4"><img src="images/it-kmitl/4.jpg" alt=""></li>
                    </ul>
                </div>-->



            </div>
        </div>
    </section>

    <!--section3-->

    <section id="section3">
        <div class="blue-screen">
        </div>
        <div class="wrapper">
            <div class="title white-color">
                <h1>การศึกษาต่อ
                    <div class="under-line white-bg-color">
                    </div>
                </h1>
            </div>
            <!-- Item 1 -->
            <div class="it-card card-item">
                <img src="{{URL('/assets/images/icon/mortarboard.svg')}}" alt="">
                <h1>To Be IT@KMITL</h1>
                <p>เตรียมความพร้อมสู่ไอทีลาดกระบัง</p>
                <button class="org-bg-color card-btn" data-toggle="modal" data-target="#it-card-model-1">รายละเอียด</button>
            </div>

            <!-- Modal 1 -->
            <div id="it-card-model-1" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h1 class="h-light text-center">To Be IT@KMIT</h1>
                        </div>
                        <div class="modal-body">
                            <h2>เตรียมความพร้อมสู่ไอทีลาดกระบัง</h2>
                            <p>สัมมนาเตรียมความพร้อมสู่ไอทีลาดกระบัง “ToBeIT@KMITL” เพื่อการเตรียมสอบเข้าคณะเทคโนโลยีสารสนเทศ
                                สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง, การปรับตัวในการเรียนมหาวิทยาลัย และไขข้อข้องใจกับพี่ๆ
                                นักศึกษาไอทีลาดกระบังทุกชั้นปี
                            <div class="alert alert-info text-center">
                                ผู้ที่สนใจสามารถเข้าชมได้ในวันศุกร์ที่ 1 กันยายน 2560 บริเวณด้านหน้าห้องประชุม Auditorium อาคารคณะเทคโนโลยีสารสนเทศ
                            </div>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</button>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Item 2 -->
            <div class="it-card card-item">
                <img src="{{URL('/assets/images/icon/presentation.svg')}}" alt="">
                <h1>การแสดงนิทรรศการทางวิชาการ</h1>
                <p>ผลงานนักศึกษาและคณาจารย์</p>
                <button class="org-bg-color card-btn" data-toggle="modal" data-target="#it-card-model-2">รายละเอียด</button>
            </div>
            <!-- Modal 2 -->
            <div id="it-card-model-2" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h1 class="h-light text-center">การแสดงนิทรรศการทางวิชาการ</h1>
                        </div>
                        <div class="modal-body">
                            <h2>ผลงานนักศึกษาและคณาจารย์</h2>
                            <p>คณะเทคโนโลยีสารสนเทศ สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง ได้มีการนำผลงานต่างๆ ของนักศึกษาระดับปริญญาตรี,
                                ปริญญาโท และ ปริญญาเอก รวมทั้งงานวิจัยของอาจารย์ในคณะฯ มาจัดแสดงให้ผู้ที่สนใจได้ชมและศึกษา
                                บริเวณโถงชั้นล่างอาคารคณะฯ </br>
                                </br> ทุกท่านจะได้รับทั้งความรู้ในเชิงวิชาการจากทั้งจากผลงานของนักศึกษา, งานวิจัยภายในคณะ รวมถึงผู้สนับสนุนต่างๆ
                                ที่จะนำเทคโนโลยีและนวัตกรรมใหม่ๆ ผู้เข้าร่วมงานทุกท่าน ได้สัมผัสกันอย่างใกล้ชิด
                            <div class="alert alert-info text-center">
                                ผู้ที่สนใจสามารถเข้าชมได้ในวันศุกร์ที่ 1 กันยายน 2560 บริเวณโถงชั้นล่างของอาคารคณะฯ ตลอดทั้งวัน
                            </div>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</button>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Item 3 -->
            <div class="it-card card-item">
                <img src="{{URL('/assets/images/icon/search.svg')}}" alt="">
                <h1>ทัวร์คณะ</h1>
                <p>นำชมคณะไอทีลาดกระบัง</p>
                <button class="org-bg-color card-btn" data-toggle="modal" data-target="#it-card-model-3">รายละเอียด</button>
            </div>
            <!-- Modal 3 -->
            <div id="it-card-model-3" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h1 class="h-light text-center">ทัวร์คณะ</h1>
                        </div>
                        <div class="modal-body">
                            <h2>นำชมคณะไอทีลาดกระบัง</h2>
                            <p>ทัวร์ที่จะพาทุกท่านไป เยี่ยมชมสถานที่จริง ไม่ว่าจะเป็น ห้องเรียน, ห้องปฏิบัติการ (Lab), ห้องเซิร์ฟเวอร์,
                                ชุมนุมของนักศึกษา และสิ่งอำนวยความสะดวกต่างๆ ภายในคณะเทคโนโลยีสารสนเทศ แบบทุกซอกทุกมุม โดยทางคณะได้มีการจัดทีมนำชมสถานที่ซึ่งมีนักศึกษาเป็นวิทยากรนำชมสถานที่
                                และแบ่งออกเป็นรอบ รอบละ 10 - 15 นาที
                            <div class="alert alert-info text-center">
                                ผู้ที่สนใจสามารถเข้าชมได้ในวันศุกร์ที่ 1 กันยายน 2560 บริเวณโถงชั้นล่างของอาคารคณะฯ ตลอดทั้งวัน
                            </div>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</button>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Item 4 -->
            <div class="it-card card-item">
                <img src="{{URL('/assets/images/icon/books.svg')}}" alt="">
                <h1>แนะนำหลักสูตรไอทีลาดกระบัง</h1>
                <p>หลักสูตรทางด้านคอมพิวเตอร์</p>
                <button class="org-bg-color card-btn" data-toggle="modal" data-target="#it-card-model-4">รายละเอียด</button>
            </div>
            <!-- Modal 4 -->
            <div id="it-card-model-4" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h1 class="h-light text-center">แนะนำหลักสูตรไอทีลาดกระบัง</h1>
                        </div>
                        <div class="modal-body">
                            <h2>หลักสูตรทางด้านคอมพิวเตอร์</h2>
                            <p>การบรรยาย "แนะแนวอาชีพและการศึกษาต่อด้านคอมพิวเตอร์และเทคโนโลยีสารสนเทศ" เชิญพบปะพูดคุยกับอาจารย์และนักศึกษาของคณะเทคโนโลยีสารสนเทศ
                                สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง ในหัวข้อข้อความแตกต่างของหลักสูตรระหว่างสาขาวิชาวิทยาการคอมพิวเตอร์,
                                วิศวกรรมคอมพิวเตอร์, วิศวกรรมสารสนเทศ และ เทคโนโลยีสารสนเทศ พร้อมทั้งเปิดโอกาสให้ผู้ร่วมงานสอบถามข้อมูลต่างๆ
                                ของหลักสูตรในคณะเทคโนโลยีสารสนเทศ
                            <div class="alert alert-info text-center">
                                ผู้ที่สนใจสามารถเข้าชมได้ในวันศุกร์ที่ 26 สิงหาคม 2559 บริเวณด้านหน้าห้องประชุม Auditorium อาคารคณะเทคโนโลยีสารสนเทศ
                            </div>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section id="section4">
        <div class="container">
            <div class="title white-color retext">
                <h1>การแข่งขัน
                    <div class="under-line white-bg-color">
                    </div>
                </h1>
            </div>

            <div class="battle-item-layout">
                <!-- Item 1 -->
                <div class=" col-xs-12 col-sm-6 col-md-4 ">
                    <div id="e-sport" class="battle-hover card-battle-item">
                        <div class="img-item-battle">
                            <img src="{{URL('/assets/images/icon/dota2.svg')}}" alt="">
                        </div>
                        <div class="text-item-battle">
                            <h1>E-SPORT

                            </h1>
                            <p>แข่งขันเกม DOTA2 ในโหมด CAPTAIN เวอร์ชันที่ใช้แข่งคือ Tournament, การแข่งขันเป็นแบบแพ้ตกรอบ รายละเอียด
                            </p>
                            <a href="/competition/esport">
                                <button class="card-battle-btn">สมัครแข่งขัน</button>
                            </a>
                        </div>

                    </div>
                </div>
                <!-- Item 1 -->
                <div class="col-xs-12 col-sm-6 col-md-4 ">
                    <div id="project-it" class="battle-hover card-battle-item">
                        <div class="img-item-battle">
                            <img src="{{URL('/assets/images/icon/dota2.svg')}}" alt="">
                        </div>
                        <div class="text-item-battle">
                            <h1>การแข่งขันโครงงาน </h1>
                            <p>สร้างสรรค์โครงงานที่มีการนำเทคโนโลยีสารสนเทศเข้ามาใช้ ที่มีความน่าสนใจทั้งในเชิงการตลาดและเทคโนโลยี..

                            </p>
                            <a href="/competition/project">
                                <button class="card-battle-btn">สมัครแข่งขัน</button>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Item 1 -->
                <div class="col-xs-12 col-sm-6 col-md-4 ">
                    <div id="network-it" class="battle-hover card-battle-item">
                        <div class="img-item-battle">
                            <img src="{{URL('/assets/images/icon/dota2.svg')}}" alt="">
                        </div>
                        <div class="text-item-battle">
                            <h1>ความปลอดภัยระบบ</h1>
                            <p>รูปแบบการแข่งขันจะเป็นการหาช่องโหว่ของระบบเพื่อแก้ปัญหาภายในเวลาที่กำหนดให้...

                            </p>
                            <a href="/competition/network">
                                <button class="card-battle-btn">สมัครแข่งขัน</button>
                            </a>
                        </div>

                    </div>
                </div>
                <!-- Item 1 -->
                <div class="col-xs-12 col-sm-6 col-md-4 ">
                    <div id="website-it" class="battle-hover card-battle-item">
                        <div class="img-item-battle">
                            <img src="{{URL('/assets/images/icon/dota2.svg')}}" alt="">
                        </div>
                        <div class="text-item-battle">
                            <h1>การแข่งขันพัฒนาเว็บไซต์</h1>
                            <p>ให้ผู้แข่งขันพัฒนาเว็บไซต์ด้วยภาษา PHP ให้มีรายละเอียดตามที่โจทย์กำหนด...
                            </p>
                            <a href="/competition/php">
                                <button class="card-battle-btn">สมัครแข่งขัน</button>
                            </a>
                        </div>

                    </div>
                </div>
                <!-- Item 1 -->
                <div class="col-xs-12 col-sm-6 col-md-4 ">
                    <div id="quiz-it" class="battle-hover card-battle-item">
                        <div class="img-item-battle">
                            <img src="{{URL('/assets/images/icon/dota2.svg')}}" alt="">
                        </div>
                        <div class="text-item-battle">
                            <h1>แก้ปัญหาเชิงวิเคราะห์</h1>
                            <p>ผู้เข้าแข่งขันต้องเขียนผลลัพธ์และแนวคิดในการแก้ปัญหาลงในกระดาษคำตอบ และส่งกระดาษคำตอบภายในเวลาที่กำหนด...
                            </p>
                            <a href="/competition/quiz">
                                <button class="card-battle-btn">สมัครแข่งขัน</button>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="bg-black">
        </div>

        <div class="bg-esport">
        </div>

        <div class="bg-project-it">
        </div>

        <div class="bg-network">
        </div>

        <div class="bg-website">
        </div>

        <div class="bg-quiz">
        </div>
    </section>


    <section id="section5">
        <div class="wrapper">
            <div class="title ">
                <h1>เวิร์คชอป
                    <div class="under-line green-bg-color">
                    </div>
                </h1>
            </div>
            <!-- Item 1 -->
            <div class="workshop-card card-item">
                <h2>MULTIMEDIA & GAME</h2>
                <h1>ขยับขับเคลื่อนด้วย AR
                    <div class="under-line green-bg-color">
                    </div>
                </h1>
                <p>ในเวิร์คชอปนี้ น้อง ๆ จะได้รู้จักกับเทคโนโลยี AR และได้เรียนรู้วิธีการสร้างเกมโดยใช้ AR </p>
                <button class="green-bg-color workshop-btn card-btn" data-toggle="modal" data-target="#workshop-1">รายละเอียด</button>
            </div>
            <!-- Item 2 -->
            <div class="workshop-card card-item">
                <h2>NETWORKS</h2>
                <h1>เชื่อมต่อทุกสรรพสิ่งด้วย IoT
                    <div class="under-line green-bg-color">
                    </div>
                </h1>
                <p>ในเวิร์คชอปนี้ น้อง ๆ จะได้เรียนรู้วิธีการประยุกต์ใช้เทคโนโลยี IoT หรืออินเตอร์เน็ทของสรรพสิ่ง...
                </p>
                <button class="green-bg-color workshop-btn card-btn" data-toggle="modal" data-target="#workshop-2">รายละเอียด</button>
            </div>
            <!-- Item 3 -->
            <div class="workshop-card card-item">
                <h2>SOFTWARE ENGINEERING</h2>
                <h1>ใส่กึ๋นให้เลโก้
                    <div class="under-line green-bg-color">
                    </div>
                </h1>
                <p>ในเวิร์คชอปนี้ น้อง ๆ จะได้เรียนรู้ทักษะการเขียนโปรแกรมภาษาจาวา เพื่อใช้ในการควบคุมการทำงานของเซ็นเซอร์ </p>
                <button class="green-bg-color workshop-btn card-btn" data-toggle="modal" data-target="#workshop-3">รายละเอียด</button>
            </div>
            <!-- Item 4 -->
            <div class="workshop-card card-item">
                <h2>DATA SCIENCE </h2>
                <h1>ตามหาโปเกม่อนด้วยวิทยาการข้อมูล
                    <div class="under-line green-bg-color">
                    </div>
                </h1>
                <p>ในเวิร์คชอปนี้ น้อง ๆ จะได้เรียนรู้ การใช้ข้อมูลการเกิดของโปเกม่อนที่หายาก มาพยากรณ์การเกิดในอนาคต </p>
                <button class="green-bg-color workshop-btn card-btn" data-toggle="modal" data-target="#workshop-4">รายละเอียด</button>
            </div>
            <!--Modal workshop-1-->
            <!-- Modal 1 -->
            <div id="workshop-1" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h1 class="h-light text-center">AR Animate : ขยับขับเคลื่อนด้วย AR </h1>
                        </div>
                        <div class="modal-body">
                            <p>AR Animate : ขยับขับเคลื่อนด้วย AR ในเวิร์คชอปนี้ น้อง ๆ จะได้รู้จักกับเทคโนโลยี AR (Augmented
                                Reality) และได้เรียนรู้วิธีการสร้างเกมโดยใช้ AR ด้วยโปรแกรมง่าย ๆ รวมทั้งฝึกทักษะการเขียนโปรแกรมควบคุมการเคลื่อนไหวของตัวการ์ตูนกราฟฟิกที่ถูกสร้างขึ้นภายใต้
                                AR
                            </p>
                            <div class="alert alert-info text-center">
                                น้อง ๆ สามารถนำความรู้จากเวิร์คชอปนี้ ไปสร้างเกมที่เสมือนจริงได้ด้วยตนเอง
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</button>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Modal 2 -->
            <div id="workshop-2" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h1 class="h-light text-center">IoT Connecting Things : เชื่อมต่อทุกสรรพสิ่งด้วย IoT </h1>
                        </div>
                        <div class="modal-body">
                            <p>
                                ในเวิร์คชอปนี้ น้อง ๆ จะได้เรียนรู้วิธีการประยุกต์ใช้เทคโนโลยี IoT หรืออินเตอร์เน็ทของสรรพสิ่ง ในการเชื่อมต่อเข้ากับอินเตอร์เน็ท
                                เพื่อส่งข้อมูลที่ตรวจจับได้จากอุปกรณ์เซ็นเซอร์ ไปเก็บไว้ยังเครื่องคอมพิวเตอร์บนคราวด์ (Cloud)
                                สำหรับให้น้อง ๆ สามารถเข้ามาตรวจสอบ หรือสามารถแจ้งเตือน ผ่านทางเครื่องคอมพิวเตอร์ โทรศัพท์มือถือ
                                หรือแทปเล็ทได้ในทุกที่ผ่านทางอินเตอร์เน็ท
                            </p>
                            <p>
                                หลังจากจบเวิร์คชอปนี้แล้ว น้อง ๆ จะเข้าใจพื้นฐานการทำงานของเทคโนโลยี IoT ซึ่งพบเห็น ในปัจจุบัน เช่น Smart home, Smart farm,
                                Healthcare monitoring เป็นต้น

                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</button>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Modal 3 -->
            <div id="workshop-3" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h1 class="h-light text-center">Give a Brain to LEGO : ใส่กึ๋นให้เลโก้ </h1>
                        </div>
                        <div class="modal-body">
                            <p>ในเวิร์คชอปนี้ น้อง ๆ จะได้เรียนรู้ทักษะการเขียนโปรแกรมภาษาจาวา เพื่อใช้ในการควบคุมการทำงานของเซ็นเซอร์
                                (Sensor) และแอคทูเอเตอร์ (Actuator) ชนิดต่าง ๆ ผ่านทางอุปกรณ์ควบคุมของเลโก้ (LEGO NXT Brick
                                Controller)
                            </p>
                            <p>
                                นอกจากนี้ น้อง ๆ ยังจะได้ทดลองเขียนโปรแกรมเพื่อใส่ความคิดลงไปให้กับหุ่นยนต์เลโก้ เพื่อให้มันสามารถปฏิบัติพันธกิจ (Mission)
                                ได้ตามที่กำหนด

                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</button>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Modal 4 -->
            <div id="workshop-4" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h1 class="h-light text-center">Data Science finds Pokemon : ตามหาโปเกม่อนด้วยวิทยาการข้อมูล</h1>
                        </div>
                        <div class="modal-body">
                            <p>ในเวิร์คชอปนี้ น้อง ๆ จะได้เรียนรู้ การใช้ข้อมูลการเกิดของโปเกม่อนที่หายาก มาพยากรณ์การเกิดในอนาคต
                                เพื่อที่เราจะได้ไปดักจับมันที่ตำแหน่งที่ดีที่สุด ด้วยวิทยาการข้อมูล
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</button>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </section>

    <!--Section 6-->

    <section id="section6">
        <div class="bg-club">
        </div>
        <div class="wrapper">
            <div class="title white-color">
                <h1>กิจกรรมชุมนุมของนักศึกษา
                    <div class="under-line org-bg-color">
                    </div>
                </h1>
            </div>
            <div class="owl-club-padding owl-carousel owl-theme">
                <!--ITEM 1-->
                <div class="item club-card card-item">
                    <div class="club-card-img">
                        <img src="{{URL('/assets/images/club/1.png')}}" alt="">
                    </div>
                    <h1>ชุมนุม IT Forge
                        <div class="under-line org-bg-color">
                        </div>
                    </h1>
                    <p>
                        IT นั้นย่อมาจาก Information Technology แปลว่า...
                    </p>
                    <button class="club-card-btn " data-toggle="modal" data-target="#clubone">ดูเพิ่มเติม</button>
                </div>
                <!--ITEM 2-->
                <div class="item club-card card-item">
                    <div class="club-card-img">
                        <img src="{{URL('/assets/images/club/2.jpg')}}" alt="">
                    </div>
                    <h1>ชุมนุมวิจัยอนิเมและหมากกระดาน
                        <div class="under-line org-bg-color">
                        </div>
                    </h1>
                    <p>สมัยนี้ อนิเมชั่นหรือการ์ตูนต่างๆเป็นสื่อที่อยู่ใกล้ตัว... </p>
                    <button class="club-card-btn " data-toggle="modal" data-target="#clubtwo">ดูเพิ่มเติม</button>
                </div>

                <!--ITEM 3-->
                <div class="item club-card card-item">
                    <div class="club-card-img">
                        <img src="{{URL('/assets/images/club/3.jpg')}}" alt="">
                    </div>
                    <h1>ชุมนุม AGAPE'
                        <div class="under-line org-bg-color">
                        </div>
                    </h1>
                    <p>
                        สันทนาการคืออะไร? น้องๆหลายคนอาจจะสงสัยว่า "สันทนาการ" คือ...
                    </p>
                    <button class="club-card-btn " data-toggle="modal" data-target="#clubthree">ดูเพิ่มเติม</button>
                </div>

                <!--ITEM 4-->
                <div class="item club-card card-item">
                    <div class="club-card-img">
                        <img src="{{URL('/assets/images/club/4.jpg')}}" alt="">
                    </div>
                    <h1>ชุมนุม FOTO+ MAG
                        <div class="under-line org-bg-color">
                        </div>
                    </h1>
                    <p>ในโอกาสพิเศษต่างๆ ไม่ว่าจะเป็นงานนิทรรศการ งานวิชาการ...
                    </p>
                    <button class="club-card-btn " data-toggle="modal" data-target="#clubfour">ดูเพิ่มเติม</button>
                </div>

                <!--ITEM 5-->
                <div class="item club-card card-item">
                    <div class="club-card-img">
                        <img src="{{URL('/assets/images/club/5.jpg')}}" alt="">
                    </div>
                    <h1>ชุมนุม Inphonic
                        <div class="under-line org-bg-color">
                        </div>
                    </h1>
                    <p>น้องๆหลายคนเมื่อได้ยินชื่อชุมนุม Inphonic...
                    </p>
                    <button class="club-card-btn " data-toggle="modal" data-target="#clubfive">ดูเพิ่มเติม</button>
                </div>

            </div>

            <!--Modal Club-->
            <!-- Modal 1 -->
            <div id="clubone" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h1 class="h-light text-center">ชุมนุม IT Forge</h1>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">
                                <img src="{{URL('/assets/images/club/1.png')}}" class="itforge">
                            </div>
                            <hr>
                            <p>IT นั้นย่อมาจาก Information Technology แปลว่า เทคโนโลยีสารสนเทศ ส่วน Forge นั้นแปลว่า การตีเหล็ก
                                หรือ โรงตีเหล็ก เพราะฉะนั้นเมื่อนำสองคำนี้มารวมกันจะหมายถึง การตีความรู้ทางด้านเทคโนโลยีสารสนเทศให้กล้าแข็งขึ้น
                                หรือ หมายถึงสถานที่สำหรับการพัฒนาความรู้ทางด้านเทคโนโลยี
                            </p>
                            <br>
                            <div class="imggroup">
                                <img src="{{URL('/assets/images/club/1-1.jpg')}}" class="img-responsive">
                            </div>
                            <br>
                            <p>
                                ITForge เป็นชุมนุมด้าน IT ของคณะเทคโนโลยีสารสนเทศ เป็นแหล่งรวมนักศึกษาที่มีความสนใจในการพัฒนา หรือ นำเทคโนโลยีมาสร้างสรรค์ในสิ่งที่มีความสนใจร่วมกัน
                                เช่น การพัฒนาเกม การพัฒนาแอพลิเคชั่น ฯลฯ นอกจากนี้ยังรวมไปถึงการถ่ายทอดความรู้ภายในคณะ เช่นการแลกเปลี่ยนประสบการณ์
                                ความรู้ระหว่างรุ่นพี่-รุ่นน้อง และการถ่ายทอดความรู้สู่ภายนอก เช่น การจัดกิจกรรมหรือการจัด
                                Workshop เผยแพร่ความรู้ด้านเทคโนโลยีทั้งหมดเพื่อตอบโจทย์ของชุมนุม คือการสร้างแหล่งรวมนักศึกษาที่พร้อมจะนำความรู้ด้าน
                                IT มาสร้างสรรค์สิ่งดีๆ สร้างประโยชน์ให้กับตนเองและสังคม
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</button>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Modal 2 -->
            <div id="clubtwo" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h1 class="h-light text-center">ชุมนุมวิจัยอนิเมและหมากกระดาน</h1>
                        </div>
                        <div class="modal-body">
                            <div class="imggroup">
                                <div class="row rownominus">
                                    <div class="col-xs-12 col-md-6">
                                        <img src="{{URL('/assets/images/club/2-1.jpg')}}" class="img-responsive">
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <img src="{{URL('/assets/images/club/2-2.jpg')}}" class="img-responsive">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <p>สมัยนี้ อนิเมชั่นหรือการ์ตูนต่างๆเป็นสื่อที่อยู่ใกล้ตัว และเป็นที่รู้จักมากขึ้น ซึ่งบางเรื่องนั้นได้มีการสอดแทรกสาระเนื้อหาที่น่าสนใจ
                                หรือมีการละเล่นต่างๆ ที่หลายๆ คนเคยเล่น แต่ห่างเหินไปเพราะเทคโนโลยีต่างๆ เริ่มมีเกมมาแทนที่
                                ชุมนุมเราจึงจัดตั้งขึ้นเพื่อวิเคราะห์สาระ แนวคิด และข้อคิด ที่มีอยู่ในอนิเมชันเหล่านั้น รวมไปถึงลักษณะต่างๆ
                                ของอนิเมชั่น และยังนำเกมกระดาน และการละเล่นต่างๆ ที่อยู่ในอนิเมมาฝึกเล่น และเรียนรู้ความแตกต่าง
                                และเพื่อสร้างความสนุกสนาน และความสามัคคีในหมู่คณะอีกด้วย มาสนุกสนานกับอนิเมชัน และเกมกระดานกันเถอะครับ
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</button>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Modal 3 -->
            <div id="clubthree" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h1 class="h-light text-center">ชุมนุม AGAPE'</h1>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="imggroup">
                                    <div class="row rownominus">
                                        <div class="col-xs-12 col-md-6">
                                            <img src="{{URL('/assets/images/club/3-1.jpg')}}" class="img-responsive">
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <img src="{{URL('/assets/images/club/3-3.jpg')}}" class="img-responsive">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <br>
                                    <p>สันทนาการคืออะไร? น้องๆหลายคนอาจจะสงสัยว่า "สันทนาการ" คืออะไร แต่บางคนก็อาจจะรู้จักคุ้นเคยกันบ้างแล้ว
                                        เพราะเคยเข้าค่ายที่ทางมหาวิทยาลัยจัดขึ้นให้น้องๆ ม.ปลาย "สันทนาการ" คือกลุ่มคนที่มารวมตัวกันทำกิจกรรมเพื่อสร้างความสุข
                                        ความสนุกสนาน ความครื้นเครง สร้างเสียงหัวเราะที่ไม่ขาดสาย สร้างรอยยิ้มให้กับน้องๆ
                                        และคอยเทคแคร์ ดูแลเอาใจใส่น้องๆด้วยความจริงใจ</p>
                                    <p>AGAPE' คืออะไร? "AGAPE" นั้นมีหลายความหมาย ความหมายแรก แปลว่า "อาการอ้าปากค้าง" (ฮามากจนหุบปากไม่ลง
                                        555+) ส่วนอีกความหมายซึ่งเป็นที่นิยมมากกว่า แปลว่า "ความรักอันบริสุทธิ์จากพระเจ้า"
                                        เป็นความรักโดยแท้จริง เพราะพวกเราชาว "AGAPE" จะมอบความรักให้กับน้องๆโดยไม่หวังสิ่งใดตอบแทน
                                        :') Open house นี้ เตรียมตัวไว้ให้ดี เพราะพี่ๆพกความสนุกสนานมาให้น้องๆ ได้เก็บกลับบ้านกันแน่นอน</p>
                                </div>
                                <div class="col-xs-12">
                                    <div class="imggroup">
                                        <img src="{{URL('/assets/images/club/3-2.jpg')}}" class="img-responsive">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</button>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Modal 4 -->
            <div id="clubfour" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h1 class="modal-title light text-center">ชุมนุม FOTO+ MAG</h1>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <p>ในโอกาสพิเศษต่างๆ ไม่ว่าจะเป็นงานนิทรรศการ งานวิชาการ งานกีฬา หรืองานพิธีสำคัญ น้องๆจะได้เห็นบุคคลกลุ่มหนึ่ง
                                        อาจจะเป็นกลุ่มเล็ก ๆ แต่มีความสำคัญไม่น้อยเลยทีเดียว พวกเขามีอุปกรณ์สำคัญอย่าง กล้องถ่ายภาพ
                                        เป็นอุปกรณ์คู่ใจที่ติดตัวไว้ตลอดเวลา พวกเขามีหน้าที่ในการเก็บภาพบรรยากาศ เหตุการณ์ต่างๆ
                                        รอยยิ้ม เสียงหัวเราะ หรือความประทับใจที่เกิดขึ้น ออกมาเป็นภาพถ่าย หรืออาจจะเป็นภาพเคลื่อนไหว
                                        พวกเขาก็คือ ช่างภาพ นั่นเอง</p>
                                </div>
                                <div class="imggroup nobottommargin">
                                    <div class="row rownominus">
                                        <div class="col-xs-12 col-md-4">
                                            <img src="{{URL('/assets/images/club/4-2.jpg')}}" class="club img-responsive">
                                        </div>
                                        <div class="hidden-xs hidden-sm col-md-4">
                                            <img src="{{URL('/assets/images/club/4-3.jpg')}}" class="club img-responsive">
                                        </div>
                                        <div class="col-xs-12 col-md-4">
                                            <img src="{{URL('/assets/images/club/4-1.jpg')}}" class="club img-responsive">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <h3>ชุมนุม FOTO+ MAG คืออะไร?</h3>
                                    <p>เป็นชุมนุมของผู้ที่สนใจ หรือรักในการถ่ายภาพ ทางชุมนุมไม่จำกัดว่าสมาชิกของชุมนุมจะต้องมีกล้องถ่ายภาพทุกคน
                                        ใครไม่มีกล้องก็สามารถที่จะร่วมกิจกรรมของชุมนุมได้ โดยกิจกรรมของชุมนุม จะจัดขึ้นเรื่อยๆ
                                        ตลอดปีการศึกษา</p>
                                    <h3>ชุมนุม FOTO+ MAG ทำอะไรบ้าง?</h3>
                                    <p>หลักๆคงหนีไม่พ้นการถ่ายภาพ แต่ชุมนุมของเราไม่ใช่เพียงแค่ถ่ายภาพบรรยากาศในงาน หรือโอกาสสำคัญต่าง
                                        ๆ เท่านั้น แต่ยังมีกิจกรรมเพิ่มเติมที่จัดให้กับสมาชิกชุมนุม เพื่อเสริมสร้างทักษะในการถ่ายภาพอีกด้วย
                                        เช่น Workshop การถ่ายภาพ และแต่งภาพ โดยพี่ๆชุมนุมที่มีความรู้ ความสามารถในด้านนี้
                                        นอกเหนือจากนี้ ยังมีกิจกรรมดีๆ อย่างเช่น จัดทริปถ่ายภาพนอกสถานที่ และกิจกรรมอื่นๆ
                                        ตลอดปีการศึกษา สำหรับน้องๆ ที่รักในการถ่ายภาพ สนใจในเทคโนโลยีเกี่ยวกับภาพถ่าย ในวันงาน
                                        จะมีการจัดแสดงนิทรรศการภาพถ่าย เป็นผลงานของนักศึกษาที่เป็นสมาชิกของชุมนุม น้องๆที่สนใจ
                                        สามารถที่จะมาเยี่ยมชม พูดคุย แลกเปลี่ยนความคิดเห็นกันได้ ที่ห้อง M16 นะคะ</p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</button>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Modal 5 -->
            <div id="clubfive" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h1 class="modal-title light text-center">ชุมนุม Inphonic</h1>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="imggroup">
                                    <div class="row rownominus">
                                        <div class="col-xs-12 col-md-6">
                                            <img src="{{URL('/assets/images/club/5-1.jpg')}}" class="club img-responsive">
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <img src="{{URL('/assets/images/club/5-2.jpg')}}" class="club img-responsive">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <p>น้องๆหลายคนเมื่อได้ยินชื่อชุมนุม Inphonic อาจจะงงกันว่าคือชุมนุมอะไร ซึ่งจริงๆแล้ว Inphonic
                                        นั้นเป็นการรวมคำว่า "Information Technology(IT)" และ "Symphonic" เข้าด้วยกัน หรือพูดง่ายๆก็คือชุมนุมดนตรีของคณะ
                                        IT เรานี่เอง ชุมนุม Inphonic นั้นจัดตั้งขึ้นเพื่อเป็นการรวมตัวผู้ชื่นชอบในดนตรีของคณะไอที
                                        ซึ่งไม่ว่าใครจะมีฝีมือระดับเทพหรือเพิ่งหัดเล่นก็สามารถเข้าร่วมชุมนุมได้ ขอ เชิญชวนน้องๆผู้ชื่นชอบและหลงไหลในเสียงดนตรีมารับชมรับฟังการแสดงดนตรีจาก
                                        พี่ๆไอทีลาดกระบังได้ภายในงาน Open House รับประกันความมันส์ตลอดงาน !!!</p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</button>
                        </div>
                    </div>

                </div>
            </div>

            <script>
                $('.owl-carousel').owlCarousel({
                    items: 5,
                    lazyLoad: true,
                    loop: false,
                    margin: 10,
                    responsive: {
                        0: {
                            items: 1,
                        },
                        1300: {
                            items: 4,
                        },
                    }
                });

                //         var owl = $('.owl-carousel');
                //         owl.owlCarousel({
                //             items:4,
                //             loop:true,
                //             margin:10,
                //             autoplay:true,
                //             autoplayTimeout:1000,
                //             autoplayHoverPause:true
                // });
            </script>
        </div>
    </section>


    <!--Section 7-->
    <section id="section7">
        <div class="wrapper">
            <div class="blue-screen">
            </div>

            <div class="title white-color">
                <h1>ภาพบบรรยากาศภายในงาน
                    <div class="under-line white-bg-color">
                    </div>
                </h1>
            </div>

            <div class="gallery">
                <div class="gallery-item owl-carousel owl-theme">
                    <img class="owl-lazy" data-src="{{URL('/assets/images/OPH2016/1.jpg')}}" alt="">
                    <img class="owl-lazy" data-src="{{URL('/assets/images/OPH2016/2.jpg')}}" alt="">
                    <img class="owl-lazy" data-src="{{URL('/assets/images/OPH2016/3.jpg')}}" alt="">
                    <img class="owl-lazy" data-src="{{URL('/assets/images/OPH2016/4.jpg')}}" alt="">
                    <img class="owl-lazy" data-src="{{URL('/assets/images/OPH2016/5.jpg')}}" alt="">
                    <img class="owl-lazy" data-src="{{URL('/assets/images/OPH2016/6.jpg')}}" alt="">
                    <img class="owl-lazy" data-src="{{URL('/assets/images/OPH2016/7.jpg')}}" alt="">
                    <img class="owl-lazy" data-src="{{URL('/assets/images/OPH2016/1.jpg')}}" alt="">
                </div>
            </div>
        </div>
    </section>

    <script>
        $('.owl-carousel').owlCarousel({
            items: 2,
            lazyLoad: true,
            loop: true,
            responsive: {
                0: {
                    items: 1,
                },
                1024: {
                    items: 2,
                },
            }
        });
    </script>
@endsection