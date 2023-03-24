<?php session_start();
if (!isset($_SESSION['user_name']))
    header("Location:../login.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SafeSpend | Budget</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://kit.fontawesome.com/2291efdc8d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="bootstrap/fonts/bootstrap-icons.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/navbar.css" type="text/css">


    <script type="text/javascript" src="bootstrap/js/jquery-3.6.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        .Progress {
            color: rgb(0, 0, 0);
            width: 82px;
            font-size: 18px;
            font-family: Inter;
            font-weight: 800;
            position: relative;
            margin-left: 15px;
        }

        .progressbar {
            border-radius: 10px;
            color: black;
            background: greenyellow;
        }

        .Progress p {
            font-size: 13;
        }

        .container-sm {
            max-width: 50%;
        }

        progress {
            width: 200px;
            height: 20px;
            border-radius: 10px;
            background-color: #FFACAC;
            overflow: hidden;
        }

        progress::-webkit-progress-bar {
            background-color: #98DFD6;
            border-radius: 10px;
        }

        /* Style the value of the progress element */
        progress::-webkit-progress-value {
            background-color: #FFACAC;
            border-radius: 10px;
        }

        .card {
            border: none;
        }

        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>
    <div id="menuHolder" style="font-family:'Poppins', sans-serif">
        <div role="navigation" class="sticky-top border-bottom border-top" id="mainNavigation">
            <div class="flexMain">
                <div class="flex2">
                    <button class="whiteLink siteLink" style="border-right:1px solid #eaeaea" onclick="menuToggle()"><i class="fas fa-bars me-2"></i> MENU</button>
                </div>
                <div class="flex3 text-center" id="siteBrand" style="font-family:'Poppins', sans-serif">
                    Resources
                </div>

                <div class="flex2 text-end d-block d-md-none">
                </div>

                <div class="flex2 text-end d-none d-md-block">

                </div>
            </div>
        </div>

        <div id="menuDrawer">
            <div class="p-4 border-bottom">
                <div class='row'>
                    <div class="col">
                        <img src=".\images\newlogo.png" style="height:3em;">
                    </div>
                    <div class="col text-end ">
                        <i class="fas fa-times" role="btn" onclick="menuToggle()"></i>
                    </div>
                </div>
            </div>
            <div>
                <a href="budget-index.php" class="nav-menu-item"><i class="fas fa-home me-3"></i>Home</a>
                <a href="transaction-index.php" class="nav-menu-item"><i class="fab fa-dollar-sign me-3"></i>Transaction History</a>
                <a href="./resources.php" class="nav-menu-item"><i class="fas fa-file-alt me-3"></i>Resources</a>
                <a href="index.html" class="nav-menu-item"><i class="fab me-3"></i>Log out</a>
                <!--
                <a href="#" class="nav-menu-item"><i class="fas fa-search me-3"></i>Explore</a>
                <a href="#" class="nav-menu-item"><i class="fas fa-wrench me-3"></i>Services</a>
                <a href="#" class="nav-menu-item"><i class="fas fa-dollar-sign me-3"></i>Pricing</a>
                <a href="#" class="nav-menu-item"><i class="fas fa-file-alt me-3"></i>Blog</a>
                <a href="#" class="nav-menu-item"><i class="fas fa-building me-3"></i>About Us</a>
                -->
            </div>
        </div>
    </div>

    <div style="font-size:1.8em; padding:5% 10%; text-align:center; background-color:#639FFF;  color:floralwhite;">Financial Resources</div>
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Tips to save money on a low income
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <div class="container">
                        <div class="container" style="text-align:center"><a href="https://www.youtube.com/watch?v=V38rn_E0r88"><button class="btn" style="background-color:#FFACAC">Watch a video</button></a></div>
                        <div class="container">
                            <ol>
                                <li>Create a budget and track your expenses.</li>
                                <li>Cut back on unnecessary expenses, such as subscriptions or services you don't need.</li>
                                <li>Shop smart and consider buying in bulk or generic brands</li>
                                <li>Cook at home instead of eating out.</li>
                                <li>Use public transportation instead of owning a car.</li>
                                <li>Look for free or low-cost entertainment.</li>
                                <li>Save your spare change and deposit it in a savings account.</li>
                            </ol>

                            Remember, every little bit helps when it comes to saving money on a low income. By making a few small changes to your spending habits, you can start building up your savings and improving your financial situation.
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    Tips on how to budget paychecks
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <div class="container">
                        <div class="container" style="text-align:center"><a href="https://www.youtube.com/watch?v=hyYab__Knb8"><button class="btn" style="background-color:#FFACAC">Watch a video</button></a></div>
                        <div class="container">
                            <ol>
                                <li>Calculate your income after taxes and deductions.</li>
                                <li>List necessary expenses and prioritize them.</li>
                                <li>Set savings goals and make them a priority.</li>
                                <li>Cut back on unnecessary expenses.</li>
                                <li>Track your spending and adjust as needed.</li>
                                <li>Be realistic and flexible with your budget.</li>
                            </ol>

                            Remember, the key to successful budgeting is to be realistic and flexible. Don't be too hard on yourself if you slip up, and be willing to make adjustments as needed.
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    Tips for personal finance for students
                </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <div class="container">
                        <div class="container" style="text-align:center"><a href="https://www.youtube.com/watch?v=MXCvtC0HqLE"><button class="btn" style="background-color:#FFACAC">Watch a video</button></a></div>
                        <div class="container">
                            <ol>
                                <li>Create a budget and stick to it.</li>
                                <li>Live within your means and avoid overspending.</li>
                                <li>Take advantage of student discounts.</li>
                                <li>Minimize student debt and consider scholarships and part-time work.</li>
                                <li>Start saving early, even a small amount.</li>
                                <li>Be realistic and flexible with your budget.</li>
                                <li>Build credit responsibly by paying bills on time and keeping balance low.</li>
                            </ol>
                            Remember, the key to successful budgeting is to be realistic and flexible. Don't be too hard on yourself if you slip up, and be willing to make adjustments as needed.
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                    Financial aid resources
                </button>
            </h2>
            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <div class="container">
                        <div class="container">
                            <ol>
                                <li>National Scholarship Portal: A platform that offers various scholarships to students across India. - <a href="https://scholarships.gov.in/">Visit</a></li>
                                <li>Ministry of Minority Affairs Scholarship: A scheme offered to students from minority communities to support their education. - <a href="https://scholarships.gov.in/">Visit</a></li>
                                <li>Central Sector Scholarship Scheme: A scholarship scheme offered to students from low-income families pursuing undergraduate and postgraduate programs. - <a href="https://scholarships.gov.in/">Visit</a></li>
                                <li>National Handicapped Finance and Development Corporation: Provides scholarships and financial assistance to students with disabilities. - <a href="http://www.nhfdc.nic.in/">Visit</a></li>
                                <li>State Governments: Many state governments in India offer scholarships and financial aid to students based on their merit and financial need. </li>
                                <li>Educational Loans: Several banks and financial institutions in India offer educational loans to students pursuing higher education. -
                                    <ul>
                                        <li>State Bank of India - <a href="https://www.sbi.co.in/loans/education-loans">Visit</a></li>
                                        <li>HDFC Bank - <a href="https://www.hdfcbank.com/personal/loans/educational-loan">Visit</a></li>
                                        <li>Axis Bank - <a href="https://www.axisbank.com/retail/loans/education-loan/features-benefits">Visit</a></li>
                                    </ul>
                                </li>
                            </ol>
                            It's important to note that each of these resources has its own eligibility criteria, application process, and deadline. Students should research and evaluate these resources carefully before applying for financial aid.
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div style="font-size:1.8em; padding:5% 10%; text-align:center;  background-color:#FBFFB1; color:dimgrey;">Metal Health Resources</div>
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Tips on coping with Financial Stress
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="container">
                            <div class="container" style="text-align:center"><a href="https://www.youtube.com/watch?v=B8QUg0PNG_Y"><button class="btn" style="background-color:#FFACAC">Watch a video</button></a></div>
                            <div class="container">
                                <ol>
                                    <li>Acknowledge and accept your feelings.</li>
                                    <li>Identify the source of your financial stress.</li>
                                    <li>Create and stick to a budget.</li>
                                    <li>Seek support from friends, family, or a financial advisor.</li>
                                    <li>Practice self-care activities to reduce stress.</li>
                                    <li>Take action to address the problem.</li>
                                    <li>Focus on the present and take steps to improve your financial situation.</li>
                                </ol>

                                Remember, coping with financial stress is about taking action and seeking support when needed. With time and effort, you can develop healthy habits and strategies to better manage your finances and reduce stress.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        How debt affects your mental health
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="container">
                            <div class="container" style="text-align:center"><a href="https://www.youtube.com/watch?v=SsuDutzcRWE"><button class="btn" style="background-color:#FFACAC">Watch a video</button></a></div>
                            <div class="container">
                                <ol>
                                    <li>Debt can lead to stress, anxiety, and depression.</li>
                                    <li>It can affect self-esteem and lead to feelings of shame or embarrassment.</li>
                                    <li>It can lead to sleep problems and physical health issues.</li>
                                    <li>It can impact relationships and cause social isolation.</li>
                                    <li>It can limit future opportunities and cause feelings of hopelessness.</li>
                                    <li>It can lead to poor decision-making and impulsive behavior.</li>
                                    <li>It can cause a cycle of debt and financial instability.</li>
                                </ol>

                                Remember, if you find yourself in a situation like the ones described above you should acknowledgeyou feelings and try to break the cycle. We believe in you.
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        Recognizing you have money problems
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="container">
                            <div class="container" style="text-align:center"><a href="https://www.youtube.com/watch?v=hmAjftS73QA"><button class="btn" style="background-color:#FFACAC">Watch a video</button></a></div>
                            <div class="container">
                                <ol>
                                    <li>Difficulty paying bills on time or in full</li>
                                    <li>Constantly worrying about money</li>
                                    <li>Arguments or tension with family members or partners about finances</li>
                                    <li>Ignoring bills or avoiding financial statements</li>
                                    <li>Feeling ashamed or embarrassed about financial situation</li>
                                </ol>
                                It is important that when we recognize that we have money problems, you need to take action to get to a better place, while that is extremely difficult there are many resources available for you to look out for your mental health.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                        Free Mental Health resources in India
                    </button>
                </h2>
                <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="container">
                            <div class="container">
                                <ol>
                                    <li>National Suicide Prevention Hotline (AASRA): +91-9820466726 (24x7 Helpline) - <a href="https://aasra.info/">Visit</a></li>
                                    <li>National Institute of Mental Health and Neurosciences (NIMHANS) - <a href="https://nimhans.ac.in/">Visit</a></li>
                                    <li>The Live Love Laugh Foundation - <a href="https://www.thelivelovelaughfoundation.org/">Visit</a></li>
                                    <li>Vandrevala Foundation - <a href="https://vandrevalafoundation.com/">Visit</a></li>
                                    <li>Mpower - <a href="https://mpowerminds.com/">Visit</a></li>
                                    <li>Fortis Stress Helpline - <a href="https://www.fortishealthcare.com/india/mental-health-helpline">Visit</a></li>
                                    <li>Manas Foundation - <a href="https://manasfoundation.in/">Visit</a></li>
                                    <li>Sneha Foundation India - <a href="https://www.snehaindia.org/">Visit</a></li>

                                </ol>
                                It's important to note that this is not an exhaustive list, and there may be other resources available depending on your location and specific needs.
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <script>
                var menuHolder = document.getElementById('menuHolder')
                var siteBrand = document.getElementById('siteBrand')

                function menuToggle() {
                    if (menuHolder.className === "drawMenu") menuHolder.className = ""
                    else menuHolder.className = "drawMenu"
                }
                if (window.innerWidth < 426) siteBrand.innerHTML = "Resources"
                window.onresize = function() {
                    if (window.innerWidth < 420) siteBrand.innerHTML = "Resources "
                    else siteBrand.innerHTML = "Resources"
                }
            </script>
</body>

</html>