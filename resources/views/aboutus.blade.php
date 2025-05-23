@extends('navbar')

@section('title', 'About Us')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/purecounterjs@1.0.2/dist/purecounter_vanilla.js"></script>
<script>
    new PureCounter();
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>


<script>
  AOS.init({ 
    duration: 1200,
  }); 
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        function animateCounter(id, start, end, duration) {
            let counter = document.getElementById(id);
            let range = end - start;
            let stepTime = Math.abs(Math.floor(duration / range));
            let startTime = new Date().getTime();
            let endTime = startTime + duration;
            let timer;

            function run() {
                let now = new Date().getTime();
                let remaining = Math.max((endTime - now) / duration, 0);
                let value = Math.round(end - (remaining * range));
                counter.innerText = value;
                if (value == end) {
                    clearInterval(timer);
                }
            }

            timer = setInterval(run, stepTime);
            run();
        }

        animateCounter("donation-counter", 1, 15, 3000);
        animateCounter("partners-counter", 1, 10, 3000);
        animateCounter("members-counter", 1, 30, 3000);
        animateCounter("hours-counter", 1, 514, 3000);
    });
</script>

<section class="">
  <div class="page-title container position-relative"  data-aos="fade-up" data-aos-delay="100" style="background-color: #003366; min-width: 100%">
    <div class="row justify-content-md-center">
      <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
        <h2 class="mb-4 display-5 text-center" style="font-size: 40px; font-weight: 700; margin-bottom: 10px; color: white;"><strong>About Us</strong></h2>
        <p class="mb-5 text-center lead fs-5" style="box-sizing: border-box; color: white; font-weight: 500;"><strong>DeepIntoOcean was created to be a platform for awareness and action. Here, readers can explore interactive data on ocean waste and see firsthand the extent of the problem. By visualizing the types, sources, and locations of trash found in the ocean, our goal is to educate and inspire everyone to take part in solving this crisis.</strong> </p>
        <br>
        <p class="mb-5 text-center lead fs-5" style="box-sizing: border-box; color: white; font-weight: 500;"><strong>This website not only serves as an educational tool but also as a hub for initiatives aimed at combating marine pollution. Together, let’s turn knowledge into action and work toward cleaner oceans for a sustainable future. </strong></p>
        <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row gy-4 align-items-lg-center"  data-aos="fade-up" data-aos-delay="100" style="margin: 40px; padding: 40px">
      <div class="col-lg-6 position-relative">
        <img class="img-fluid rounded border border-dark" loading="lazy" src="storage/other_images/trashinocean.jpg" alt="trashinocean">
      </div>
      <div class="col-lg-6 content" style="justify-content: center; align-items: center; display: flex; text-align: justify;">
        <p class="lead mb-4 mb-md-5">The ocean is more than just a vast expanse of water; it is a lifeline for our planet, providing food, oxygen, and regulating the climate. Yet, human activities have overwhelmed it with waste, threatening marine ecosystems. Reports estimate that 11 million metric tons of plastic waste enter the oceans each year, with this figure projected to nearly triple by 2040 if no action is taken. Indonesia, as one of the largest archipelagic nations, contributes significantly to this problem due to improper waste management and rising plastic consumption.</p>
      </div>
    </div>
  </div>

  <div class="container"  data-aos="fade-up" data-aos-delay="200" style="background-color: #f4f8fb; margin-bottom: 50px;">
    <div class="row gy-4">
      <div class="col-lg-3 col-md-6">
          <div class="stats-item text-center w-100 h-100">
              <h3 class="display-5 fw-bold text-primary text-center mb-2">
                  RP. <span id="donation-counter">1</span>M +
              </h3>
              <p>Donation Amount</p>
          </div>
      </div>
      <div class="col-lg-3 col-md-6">
          <div class="stats-item text-center w-100 h-100">
              <h3 class="display-5 fw-bold text-primary text-center mb-2">
                  <span id="partners-counter">1</span>+
              </h3>
              <p>Partners</p>
          </div>
      </div>
      <div class="col-lg-3 col-md-6">
          <div class="stats-item text-center w-100 h-100">
              <h3 class="display-5 fw-bold text-primary text-center mb-2">
                  <span id="members-counter">1</span>+
              </h3>
              <p>Members</p>
          </div>
      </div>
      <div class="col-lg-3 col-md-6">
          <div class="stats-item text-center w-100 h-100">
              <h3 class="display-5 fw-bold text-primary text-center mb-2">
                  <span id="hours-counter">1</span>+
              </h3>
              <p>Hours of Work</p>
          </div>
      </div>
    </div>
  </div>
</section>

@endsection



