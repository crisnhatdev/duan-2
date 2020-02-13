<?php require_once '../view/header.php';?>

<section class="breadcrumb breadcrumb_bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>Liên Hệ </h2>
              <p>Trang Chủ <span>-</span> Liên Hệ</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- breadcrumb start-->

  <!-- ================ contact section start ================= -->
  <section class="contact-section padding_top">
    <div class="container">
      <div class="d-none d-sm-block mb-5 pb-4">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.457135362689!2d106.6243551146233!3d10.8
        52793492269738!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752a272ac90551%3A0xfdedca96b3ea5e15!2zQ8O0
        bmcgdmnDqm4gcGjhuqduIG3hu4FtIFF1YW5nIFRydW5n!5e0!3m2!1sen!2s!4v1581596165394!5m2!1sen!2s" width="100%" height="450"
         frameborder="0" style="border:0;" allowfullscreen=""></iframe>
      </div>


      <div class="row">
        <div class="col-12">
          <h2 class="contact-title">Liên Hệ</h2>
        </div>
        <div class="col-lg-8">
          <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm"
            novalidate="novalidate">
            <div class="row">
              <div class="col-12">
                <div class="form-group">

                  <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9"
                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'"
                    placeholder='Gửi tin nhắn'></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="name" id="name" type="text" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter your name'" placeholder='Tên của bạn'>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="email" id="email" type="email" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter email address'" placeholder='Email liên hệ'>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter Subject'" placeholder='Ý kiến của bạn'>
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <a href="#" class="btn_3 button-contactForm">Gửi tin nhắn</a>
            </div>
          </form>
        </div>
        <div class="col-lg-4">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <h3>Công Viên Phần Mềm Quang Trung</h3>
              <p>Tân Chánh Hiệp Q12</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
            <div class="media-body">
              <h3>012345678</h3>
              <p>Thứ 2 đến thứ 7 </p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <h3>Duynhatbao@gmail.com</h3>
              <p>Đóng góp ý kiến bất cứ khi nào</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php require_once '../view/footer.php';?>