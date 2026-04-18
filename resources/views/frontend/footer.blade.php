<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
AOS.init();

// Scroll top
let topBtn = document.getElementById('topBtn');
window.onscroll = function() {
    topBtn.style.display = window.scrollY > 300 ? 'block' : 'none';
};

topBtn.onclick = () => window.scrollTo({ top: 0, behavior: 'smooth' });
</script>
</body>
</html>
