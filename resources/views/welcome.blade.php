<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Kader Bank Sampah Online" />
        <title>Kader Bank Sampah Online</title>
        <link rel="icon" type="image/x-icon" href="assets/media/logos/favicon.png" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body onload="load()">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
            <div class="container px-5">
				<a class="navbar-brand fw-bold" href="#page-top">Kader Bank Sampah Online</a>
                <img class="max-h-70px navbar-brand fw-bold" height="50px" src="assets/media/logos/logo-letter-1.png" alt="Bank Sampah Online">
				<img class="max-h-70px navbar-brand fw-bold" height="50px" src="assets/media/logos/logo-gogreenschool.png" alt="Bank Sampah Online">
				
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="bi-list"></i>
                </button>
				
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                        @if (auth()->check())
                        <li class="nav-item"><a class="nav-link me-lg-3 fw-bold" href="{{ route('dashboard') }}">Dahsboard</a></li>
                        @else
                        <li class="nav-item"><a class="nav-link me-lg-3 fw-bold" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link me-lg-3" href="{{ route('register') }}">Register</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Mashead header-->
        <header class="masthead">
            <div class="container px-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-7 order-lg-1 mb-5 mb-lg-0">
                        <div class="container-fluid px-5">
                            <div class="row gx-5">
								<div class="col-md-4 mb-5">
                                    <!-- Feature item-->
                                    <div class="text-center">
                                        <i class="bi bi-shop icon-feature text-gradient d-block mb-1"></i>
                                        <h3 class="font-alt" id="bank-sampah">3500</h3>
                                        <p class="text-muted mb-0">Bank Sampah</p>
                                    </div>
                                </div>
								
                                <div class="col-md-4 mb-5">
                                    <!-- Feature item-->
                                    <div class="text-center">
                                        <i class="bi bi-person-plus icon-feature text-gradient d-block mb-1"></i>
                                        <h3 class="font-alt" id="nasabah">2030</h3>
                                        <p class="text-muted mb-0">Nasabah</p>
                                    </div>
                                </div>
								
								<div class="col-md-4 mb-5 mb-md-0">
                                    <!-- Feature item-->
                                    <div class="text-center">
                                        <i class="bi bi-people icon-feature text-gradient d-block mb-1"></i>
                                        <h3 class="font-alt" id="kaderisasi">1500</h3>
                                        <p class="text-muted mb-0">Kaderisasi</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-5 mb-md-0">
                                    <!-- Feature item-->
                                    <div class="text-center">
                                        <i class="bi bi-archive-fill icon-feature text-gradient d-block mb-1"></i>
                                        <h3 class="font-alt d-inline" id="plastik">1240</h3> <span class="d-inline">KG<span>
                                        <p class="text-muted mb-0">Plastik</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Feature item-->
                                    <div class="text-center">
                                        <i class="bi bi-archive icon-feature text-gradient d-block mb-1"></i>
                                        <h3 class="font-alt d-inline" id="non-plastik">1240</h3> <span class="d-inline">KG<span>
                                        <p class="text-muted mb-0">Non Plastik</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 order-lg-0">
                        <!-- Mashead text and app badges-->
                        <div class="mb-5 mb-lg-0 text-center text-lg-start">
                            <h1 class="display-1 lh-1 mb-3">Mari Bergerak Bersama</h1>
                            <h2 class="text-muted font-alt mb-4 px-0">Kader Bank Sampah Online</h2>
                            <div class="d-flex flex-column flex-lg-row align-items-center">
                                <!--<a class="me-lg-3 mb-4 mb-lg-0" href="#!"><img class="app-badge" src="assets/img/google-play-badge.svg" alt="..." /></a>
                                <a href="#!"><img class="app-badge" src="assets/img/app-store-badge.svg" alt="..." /></a>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <footer class="bg-black text-center py-5">
            <div class="container px-5">
                <div class="text-white-50 small">
                    <div class="mb-2">&copy; Bank Sampah Online 2021. All Rights Reserved.</div>
                    <a href="#!">Privacy</a>
                    <span class="mx-1">&middot;</span>
                    <a href="#!">Terms</a>
                    <span class="mx-1">&middot;</span>
                    <a href="#!">FAQ</a>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
		<script>
			function animate(obj, initVal, lastVal, duration) {

					let startTime = null;

					//get the current timestamp and assign it to the currentTime variable
					let currentTime = Date.now();

					//pass the current timestamp to the step function
					const step = (currentTime ) => {

						//if the start time is null, assign the current time to startTime
						if (!startTime) {
							  startTime = currentTime ;
						}

						//calculate the value to be used in calculating the number to be displayed
						const progress = Math.min((currentTime  - startTime) / duration, 1);

						//calculate what to be displayed using the value gotten above
						obj.innerHTML = Math.floor(progress * (lastVal - initVal) + initVal);

						//checking to make sure the counter does not exceed the last value (lastVal)
						if (progress < 1) {
							  window.requestAnimationFrame(step);
						}
						else{
							  window.cancelAnimationFrame(window.requestAnimationFrame(step));
						}
					};

					//start animating
					window.requestAnimationFrame(step);
				}

				const load = () => {
					animate(document.getElementById('bank-sampah'), 0, 3500, 5000);
					animate(document.getElementById('nasabah'), 0, 2030, 5000);
					animate(document.getElementById('kaderisasi'), 0, 1500, 5000);
					animate(document.getElementById('plastik'), 0, 1500, 5000);
					animate(document.getElementById('non-plastik'), 0, 1240, 5000);
				}
		</script>
    </body>
</html>
