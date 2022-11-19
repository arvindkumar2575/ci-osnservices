function myFunction1() {
    var x = document.getElementById("option-1").value;
    if (x == 'select') {
        document.getElementById("message-div").style.display = 'none';
        document.getElementById("itr-info-div").style.display = 'none';
        document.getElementById("itr-fling-message-div").style.display = 'none';
        document.getElementById("referral-div").style.display = 'none';
        document.getElementById("choose-files-div").style.display = 'none';
    } if (x == 'New Customer') {
        document.getElementById("message-div").style.display = 'flex';
        document.getElementById("itr-info-div").style.display = 'none';
        document.getElementById("itr-fling-message-div").style.display = 'none';
        document.getElementById("referral-div").style.display = 'none';
        document.getElementById("choose-files-div").style.display = 'none';
    }
    if (x == 'Information regarding ITR') {
        document.getElementById("message-div").style.display = 'none';
        document.getElementById("itr-info-div").style.display = 'flex';
        document.getElementById("itr-fling-message-div").style.display = 'none';
        document.getElementById("referral-div").style.display = 'none';
        document.getElementById("choose-files-div").style.display = 'none';
    }
    if (x == 'ITR Filing') {
        document.getElementById("message-div").style.display = 'none';
        document.getElementById("itr-info-div").style.display = 'none';
        document.getElementById("itr-fling-message-div").style.display = 'flex';
        document.getElementById("referral-div").style.display = 'none';
        document.getElementById("choose-files-div").style.display = 'none';
    }
    if (x == 'Referral') {
        document.getElementById("message-div").style.display = 'none';
        document.getElementById("itr-info-div").style.display = 'none';
        document.getElementById("itr-fling-message-div").style.display = 'none';
        document.getElementById("referral-div").style.display = 'flex';
        document.getElementById("choose-files-div").style.display = 'none';
    }
    if (x == 'Document Attachment') {
        document.getElementById("message-div").style.display = 'none';
        document.getElementById("itr-info-div").style.display = 'none';
        document.getElementById("itr-fling-message-div").style.display = 'none';
        document.getElementById("referral-div").style.display = 'none';
        document.getElementById("choose-files-div").style.display = 'flex';
    }
}
