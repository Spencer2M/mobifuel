<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/emailjs-com@2.3.2/dist/email.min.js"></script>
<script type="text/javascript">
   (function(){
      emailjs.init("user_kGzAjZWNqPs2KmO13S58T");
   })();


sendmail();
function sendmail(){



var templateParams = {
    name: 'Urgent New Fuel Order',
    notes: 'Hello Administrator,You have Got Anew Order with the Mobifuel App  Login to dashboard for Details.Thanks'
};
 
emailjs.send('gmailme', 'bus_ticket', templateParams)
    .then(function(response) {
       console.log('SUCCESS!', response.status, response.text);
    }, function(error) {
       console.log('FAILED...', error);
    });
}





</script>