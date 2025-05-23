@extends('customer.navbar')

@section('title', 'Donate')

@section('content')

<style>
    :root {
        --primary-color: #007BA7;
    }

    body {
        background-color: #f5f5f5;
        font-family: Arial, sans-serif;
    }

    .btn {
        padding: 10px 20px; 
        border: 1px solid #ccc; 
        cursor: pointer; 
        background-color: #2c92c4;
        color: white;
        padding: 10px 20px;
        font-size: 1rem;
        transition: background-color 0.3s ease;
        width: 100%; 
    }

    .btn:hover {
        background-color: #003366;
    }

    .bank-account {
        background-color: var(--primary-color);
        color: white;
        text-align: center;
        font-size: 12px;
        font-weight: bold;
    }

    .card-title {
        color: var(--primary-color);
        font-size: 2rem;
        text-align: center;
        margin-bottom: 2rem;
    } 

    .card-header, .card-body {
        display: flex;
        flex-direction: column;
    }

    .card-header {
        font-size: 2.5rem;
        font-weight: bold;
        background-color: #003366;
        color: whitesmoke;
    }

    .card-body{
        padding-top: 1.5rem;
    }

    .donation-container {
        display: flex; 
        flex-direction: column; 
        justify-content: center; 
        align-items: center;
        height: 100%;
        width: 100%;
        background-image: url('/storage/other_images/deepocean.jpeg');
        background-size: cover; 
        background-position: center; 
        background-repeat: no-repeat; 
    }

    .donation-section {
        text-align: center;
        padding: 100px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .donation-open {
        background-color: green;
        color: white;
        padding: 2rem;
        text-align: center;
        font-size: 2rem;
        font-weight: bold;
    }

    .form-control { 
        padding: 10px; 
        border: 1px solid #ccc; 
        border-top-right-radius: 5px; 
        border-bottom-right-radius: 5px; 
        width: 200px; 
        font-size: 16px; 
    }

    .form-checkbox{ 
        display: flex; 
        align-items: center; 
        margin-bottom: 10px; 
        border: 0.5px solid #ccc; 
        border-top-right-radius: 5px; 
        border-bottom-right-radius: 5px; 
    } 

    .form-checkbox:hover {
        background-color: #F5FEFD;
    }
    
    .form-checkbox label { 
        margin-left: 20px; 
    }

    .form-input { 
        max-width: 600px; 
    }

    .highlight {
        font-weight: bold;
        color: 
    }

    .input-group .input-group-text { 
        padding: 10px; 
        background-color: #e9ecef; 
        border: 1px solid #ccc; 
        border-top-left-radius: 5px; 
        border-bottom-left-radius: 5px; 
    } 

    .input-group { 
        display: flex; 
        align-items: center; 
        margin-top: 10px; 
    }

    .steps-list {
        padding-left: 1.5rem;
    }

    .steps-list li {
        margin-bottom: 1rem;
        font-size: 1.1rem;
        line-height: 1.6;
    }

    .text-container{
        padding: 20px;
        padding-right: 30px; 
        color: white; 
        max-width: 500px; 
        display: flex; 
        flex-direction: column; 
        justify-content: center; 
    }

    .title {
        color: var(--primary-color);
        font-size: 3rem;
        font-weight: bold;
        margin-bottom: 2rem;
    }

    .collected-amount {
        margin-bottom: 15px;
        font-size: 1rem;
    }

    .progress {
        height: 10px;
        background-color: #e9ecef;
        border-radius: 5px;
    }

    .progress-bar {
        background-color: #007bff;
        line-height: 10px;
        color: white;
        text-align: center;
    }


</style>

<div class="donation-container">
    <div class="container donation-section">
        <div class="row">
            <div class="text-container col-md-6">
                <div class="text"> 
                    <h2 class="text fw-bold" style="display:inline-block;">Act Now: Your Donation can Clean our Oceans!</h2> 
                    <hr>
                    <h3 class="text fw-bold" style="text-align: justify">Join the fight against plastic pollution with your generous donation. 
                        Together, we can make a significant impact and protect marine life. 
                        Be the change our planet needs.
                    </h3>
                </div>
            </div>

            <div class="form-section col-md-6">
                <!-- View 1 -->
                <div class="form-input" id="donationView">
                    <div class="card">
                        <div class="card-header align-items-center">{{'Donate'}}</div>
                        <div class="card-body align-items-center">
                            <div class="donation-card">
                                <div class="donation-open">
                                    Donation Open
                                    <div class="collected-amount"> 
                                        <p>Collected Rp <strong><span id="formattedTotalAmount"></span></strong> / <strong><span id="goalAmount"></span></strong></p> 
                                    </div> 
                                    <div class="progress"> 
                                        <div class="progress-bar" role="progressbar" style="width: {{ $percentageCollected }}%;" aria-valuenow="{{ $percentageCollected }}" aria-valuemin="0" aria-valuemax="100"></div> 
                                    </div>
                                </div>
                                <form action="/donate" method="POST" id="donationForm">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <h5 class="text fw-bold">Donation Amount</h5>

                                        <div class="btn-group btn-group-toggle d-flex flex-column pt-2" name="inputAmount" data-toggle="buttons"  required>
                                            <div class="btn btn-outline-primary mb-3 fw-bold" onclick="selectAmount(10000, this)">Rp. 10.000</div>
                                            <div class="btn btn-outline-primary mb-3 fw-bold" onclick="selectAmount(25000, this)">Rp. 25.000</div>
                                            <div class="btn btn-outline-primary mb-3 fw-bold" onclick="selectAmount(50000, this)">Rp. 50.000</div>
                                            <div class="btn btn-outline-primary mb-3 fw-bold" onclick="selectAmount(100000, this)">Rp. 100.000</div>
                                        </div> 
                                        <label>Input other amount</label>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp</span>
                                            <input type="number" class="form-control" id="inputAmount" name="donationAmount" 
                                                data-validate="amount" placeholder="Type amount...." min="10000" oninput="clearButtonSelection()" required>
                                        </div>
                                        <small>Min. Donation Amount is Rp10.000</small>
                                        <div class="text-danger" id="amountError" style="display:none;">Please select or enter a donation amount.</div>
                                    </div>
                                    <button type="button" class="btn btn-primary btn-block" onclick="showDetailsView()">Next</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- View 2 -->
                <div class="form-input" id="detailsView" style="display:none;">
                    <div class="card" style="width: 400px"> 
                        <div class="card-header">{{'Details'}}</div>
                        <div class="card-body"> 
                            <div style="display: flex; background-color: #ECFBFC">
                                <p>You are donate <strong><span id="displayAmount"></span></strong></p> 
                                <a href="/donate" style="margin-left: 10px;">Change Amount</a>
                            </div>

                            <form action="/donations" method="POST" enctype="multipart/form-data"> 
                                @csrf
                                <div class="form-group pb-3 d-flex" style="background-color: #ECFBFC;"> 
                                    <label for="payment_method">Payment Method (Transfer)</label>
                                    <select class="form-control" id="payment_method" name="payment_method" required>
                                        <option value="BCA Transfer">BCA Transfer</option>
                                        <option value="Mandiri Transfer">Mandiri Transfer</option>  
                                        <option value="BRI Transfer">BRI Transfer</option>
                                        <option value="BNI Transfer">BNI Transfer</option>
                                        <option value="BSI Transfer">BSI Transfer</option>
                                        <option value="Permata Transfer">Permata Transfer</option>        
                                        <option value="CIMB Transfer">CIMB Transfer</option>
                                        <option value="Danamon Transfer">Danamon Transfer</option>    
                                    </select> 
                                </div> 
                                <p style="text-align: justify; background-color: #ECFBFC;">Thank you for your generosity and support. 
                                Your contribution makes a significant difference. 
                                Together, we can create a brighter future for those in need.</p> 
                                
                                <div class="form-checkbox">
                                    <input type="checkbox" id="age" name="age" onchange="checkCheckboxes()"> 
                                    <label for="age">I am 17 years old or older</label>
                                </div> 
                                <div class="form-checkbox">
                                    <input type="checkbox" id="agreement" name="agreement" onchange="checkCheckboxes()"> 
                                    <label for="agreement" style="text-align: justify;"> 
                                        I agree that this support is given voluntarily and not in exchange for commercial activities, in accordance with the 
                                        <a href="/termsandconditions">Terms&Condition</a> 
                                    </label> 
                                </div>
                                
                                <div class="bank-account" id="bankAccount" style="display:none;"> 
                                    <p>Donation could be done by transferring to <br><span>DeepIntoOcean bank account (BCA): 527189172</span></p> 
                                </div> 
                                
                                <div class="form-checkbox pt-1" id="newCheckbox" style="display:none">
                                    <input type="checkbox" id="confirm" name="confirm" onchange="checkCheckboxes()">   
                                    <label for="confirm" style="text-align: justify;">I confirm that my donation details are correct, and I have transferred the donation to the bank account.</label>
                                </div> 

                                <div class="d-flex justify-content-between align-items-center" style="gap: 20px;">
                                <input type="hidden" id="amount" name="amount">
                                    <button type="button" class="btn btn-secondary btn-block" onclick="goBack()">Previous</button> 
                                    <button type="submit" class="btn btn-primary btn-block" id="donateBtn" disabled>Donate</button>
                                </div>
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>

<script>
    var totalAmountCollected = {{ $totalAmountCollected ??0}};
    var goalAmount = {{$goalAmount ??0}}
    document.getElementById('formattedTotalAmount').innerText = formatNumber(totalAmountCollected);
    document.getElementById('goalAmount').innerText = formatNumber(goalAmount);

    function selectAmount(amount, button) {
        document.getElementById('amount').value = amount; 
        document.getElementById('amountError').style.display = 'none'; 
        const buttons = document.querySelectorAll('.btn-group .btn'); 
        buttons.forEach(button => button.classList.remove('active')); 
        button.classList.add('active'); 
        document.getElementById('inputAmount').value = '';
    }

    function clearButtonSelection() {
        const buttons = document.querySelectorAll('.btn-group .btn');
        buttons.forEach(button => button.classList.remove('active'));
        document.getElementById('amountError').style.display = 'none';
    }

    function formatNumber(num) {
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    function showDetailsView() {
        let inputAmount = document.getElementById('inputAmount').value; 
        let selectedAmount = document.getElementById('amount').value;
        
        if (inputAmount >= 10000) { 
            document.getElementById('amount').value = inputAmount; 
            document.getElementById('amountError').style.display = 'none'; 
        } else if (selectedAmount) { 
            document.getElementById('amount').value = selectedAmount; 
            document.getElementById('amountError').style.display = 'none'; 
        } else { 
            document.getElementById('amountError').style.display = 'block'; 
            return; 
        }

        const amount = document.getElementById('amount').value;
        document.getElementById('displayAmount').innerText = `Rp ${formatNumber(amount)}`;
        document.getElementById('donationView').style.display = 'none';
        document.getElementById('detailsView').style.display = 'block'; 
    }

    function goBack(){
        document.getElementById('detailsView').style.display = 'none'; 
        document.getElementById('donationView').style.display = 'block';
        document.getElementById('inputAmount').value = '';
            
        // Clear button group selection
        const buttons = document.querySelectorAll('.btn-group .btn'); 
        buttons.forEach(button => button.classList.remove('active'));
            
        // Clear selected amount
        document.getElementById('amount').value = ''; 
    }

    function checkCheckboxes(){
        const ageChecked = document.getElementById('age').checked; 
        const agreementChecked = document.getElementById('agreement').checked; 
        const bankAccount = document.getElementById('bankAccount'); 
        const newCheckbox = document.getElementById('newCheckbox'); 
        const confirmChecked = document.getElementById('confirm').checked; 
        const donateBtn = document.getElementById('donateBtn'); 
        if (ageChecked && agreementChecked) { 
            bankAccount.style.display = 'block'; 
            newCheckbox.style.display = 'block'; 
            newCheckbox.style.display = 'flex';
        } else { 
            bankAccount.style.display = 'none'; 
            newCheckbox.style.display = 'none'; 
            donateBtn.disabled = true; 
        } 
        
        if (ageChecked && agreementChecked && confirmChecked) { 
            donateBtn.disabled = false; 
        } else { 
            donateBtn.disabled = true; 
        }
    }
</script>
@endsection

