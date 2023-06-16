<template>
 <section id="contact-us">

  <div class="w-full bg-center bg-no-repeat bg-cover overflow-hidden"
      style="background-image: url('images/photo-1543269865-0a740d43b90c.webp');">
      <div class="bg-gradient-to-tr h-full z-10 opacity-80"
        style="background-image: linear-gradient(45deg, #f200ff 0%, #ffba42 100%);">
        <div class="container mx-auto h-full">
       
          <div class="h-[80%] flex items-center py-40">
            <div class="mt-[10%]">
              <h2 class="text-white font-poppins font-normal text-[18px] ml-3">BLOGJECT > CONTACT US</h2>
              <h1 class="text-white font-poppins font-black leading-[1] text-[9vw]">CONTACT US</h1>
            </div>

          </div>
        </div>
      </div>
    </div>


        <h1>Get in Touch!</h1>

        <!-- contact info -->
        <div class="container">
          <div class="contact-info">
            <div class="specific-info">
              <i class="fas fa-home"></i>
              <div>
                <p class="title">4th floor, Hi Center</p>
                <p class="subtitle">Moi Avenue</p>
              </div>
            </div>
            <div class="specific-info">
              <i class="fas fa-phone-alt"></i>
              <div>
                <a href="">+254 720 XXX XXX </a>
                <br />
                <a href="">+254 721 XXX XXX</a>

                <p class="subtitle">Mon to Fri 9am-6pm</p>
              </div>
            </div>
            <div class="specific-info">
              <i class="fas fa-envelope-open-text"></i>
              <div>
                <a href="mailto:info@alphayo.co.ke">
                  <p class="title">info@alphayo.co.ke</p>
                </a>
                <p class="subtitle">Send us your query anytime!</p>
              </div>
            </div>
          </div>

          <!-- Contact Form -->
          <div class="contact-form">
            <form action="" method="">
              <!-- Name -->
              <label for="name"><span>Name</span></label>
              <input type="text" id="name" name="name" value="" />

              <!-- Email -->
              <label for="email"><span>Email</span></label>
              <input type="text" id="email" name="email" value="" />

              <!-- Subject -->
              <label for="subject"><span>Subject</span></label>
              <input type="text" id="Subject" name="subject" value="" />

              <!-- Message -->
              <label for="message"><span>Message</span></label>
              <textarea id="message" name="message"></textarea>

               <!-- Button -->
              <input type="submit" value="Submit" />
            </form>
          </div>
        </div>
      </section>
</template>
