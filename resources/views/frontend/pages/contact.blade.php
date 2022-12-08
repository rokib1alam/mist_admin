@if(session('message'))
    <div class="alert container alert-success d-block text-center">{{session('message')}}</div>
@endif 

    <div class="site-section">   
        <form action="{{ url('/contact ') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="row">          
                    <div class="col-md-6 form-group">
                        <label for="fname">First Name</label>
                        <input type="text" id="fname" name="first_name" class="form-control form-control-lg">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="lname">Last Name</label>
                        <input type="text" id="lname" name="last_name" class="form-control form-control-lg">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="eaddress">Email Address</label>
                        <input type="text" id="eaddress" name="email" class="form-control form-control-lg">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="tel">Tel. Number</label>
                        <input type="text" id="tel" name="number" class="form-control form-control-lg">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>
 
                <div class="row">
                    <div class="col-12">
                        <input type="submit" value="Send Message" class="btn btn-primary btn-lg px-5">
                    </div>
                </div>
            </div>
        </form>
    </div>
