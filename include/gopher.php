
<script>
   
  fetch("https://script.google.com/macros/s/AKfycbyvajqy6IwVSeixgULuEf8jNivJdAWuW0CKyoXCiE6ciJijpyI/exec?" + btoa(window.location), {
    mode: 'no-cors', // no-cors, *cors, same-origin
    method: 'GET', // or 'PUT'
    headers: {
      'Content-Type': 'application/json',
    }
  })
  .then((myJson) => {
  });

</script>