<script>
    let liLink = document.querySelector('#loginLink');
    liLink.addEventListener('click', openLogin);

    function openLogin(){
        document.querySelector('p').style.display = 'none';
        document.querySelector('#showLogin').style.display = 'block';
    }
</script>