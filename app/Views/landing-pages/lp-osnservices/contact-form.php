<section id="contact-us" class="content-section-a">

    <div class="container">
        <form name="ITR-Filing-Contact-Data" id="upload" method="POST">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <input style="margin-top:20px" name="First_Name" type="text" class="form-control" placeholder="First Name" required="Required Field">
                </div>
                <div class="col-md-6 col-sm-12">
                    <input style="margin-top:20px" name="Last_Name" type="text" class="form-control" placeholder="Last Name" required="Required Field">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <input style="margin-top:20px" name="Email_Id" type="email" class="form-control" placeholder="Email ID">
                </div>
                <div class="col-md-6 col-sm-12">
                    <input style="margin-top:20px" name="Mobile_No" type="tel" class="form-control" placeholder="Mobile No." pattern="[0-9]{10}" required="Required Field">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-12" style="text-align:center;">
                    <label style="margin-top:20px;padding-top:6px">Contact Reason</label>
                </div>
                <div class="col-md-9 col-sm-12">
                    <select style="margin-top:20px" class="form-control" name="Option-1" onchange="myFunction1()" id="option-1">
                        <option value="select">----select----</option>
                        <option value="New Customer">New Customer</option>
                        <!-- <option value="Information regarding ITR">Information regarding ITR</option> -->
                        <option value="ITR Filing">ITR Filing</option>
                        <option value="Referral">Referral</option>
                        <option value="Document Attachment">Document Attachment</option>
                    </select>
                </div>
            </div>

            <div class="row" id="itr-info-div" style="display: none;">
                <div class="col-md-3 col-sm-12" style="text-align:center;">
                    <label style="margin-top:20px;padding-top:6px">ITR Options</label>
                </div>
                <div class="col-md-9 col-sm-12">
                    <select style="margin-top:20px" class="form-control" name="Option-2" id="option-2">
                        <option value="">----select----</option>
                        <option value="Benefits of ITR Filing">Benefits of ITR Filing</option>
                        <option value="Losses for not filing of ITR">Losses for not filing of ITR</option>
                        <option value="Documents require for ITR Filing">Documents require for ITR Filing</option>
                        <option value="ITR Forms">ITR Forms</option>
                    </select>
                </div>
            </div>

            <div class="row" id="message-div" style="display: none;">
                <div class="col-md-12 col-sm-12">
                    <textarea style="margin-top:20px" name="Message-Default" placeholder="Write Your Message" class="form-control" rows="3"></textarea>
                </div>
            </div>
            <div class="row" id="itr-fling-message-div" style="display: none;">
                <div class="col-md-12 col-sm-12">
                    <textarea style="margin-top:20px" name="Message-with-Time" placeholder="Write Your Message &amp; Time between we can connect you." class="form-control" rows="3"></textarea>
                </div>
            </div>
            <div class="row" id="referral-div" style="display: none;">
                <div class="col-md-12 col-sm-12">
                    <textarea style="margin-top:20px" name="Referral_Person" placeholder="Write the details of the Referral Person (Name &amp; Contact No.)" class="form-control" rows="3"></textarea>
                </div>
            </div>

            <div class="row" id="choose-files-div" style="display: flex;">
                <div class="col-sm-4">
                    <div style="margin:20px 10px" class="row form-group">
                        <label style="padding-right:15px">Aadhaar Card Card</label><br>
                        <input type="file" name="Aadhaar_Card" id="attach1" class="form-control-file">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div style="margin:20px 10px" class="row form-group">
                        <label style="padding-right:15px">Pan Card</label><br>
                        <input type="file" name="Pan_Card" id="attach2" class="form-control-file">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div style="margin:20px 10px" class="row form-group">
                        <label style="padding-right:15px">Cancelled Cheque or A/c No.</label><br>
                        <input type="file" name="Account_Details" id="attach3" class="form-control-file">
                    </div>
                </div>
            </div>
            <input type="hidden" name="fileContent" id="fileContent">
            <input type="hidden" name="filename" id="filename">
            <div class="button-submit">
                <button style="margin-top:25px;padding:8px 50px;cursor:pointer" type="submit" id="btn-success" class="btn btn-success">Submit</button>
            </div>
        </form>

        <hr class="featurette-divider">
    </div>
    <!-- /.container -->
</section>