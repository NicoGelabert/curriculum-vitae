<button 
    @click="mobileMenuOpen = !mobileMenuOpen" 
    class="p-4 block md:hidden z-10"
>
    <div class="openbtn">
        <div class="openbtn-area"><span></span><span></span><span></span>
        </div>
    </div>
    
</button>

<script>
    // document.querySelectorAll(".openbtn").forEach(function(btn) {
    //     btn.addEventListener("click", function() {
    //         this.classList.toggle("active");
    //     });
    // });

    const buttons = document.querySelectorAll(".openbtn");

    // Función para actualizar el estado de los botones
    function updateButtonState() {
        buttons.forEach(function(btn) {
            if (mobileMenuOpen) {
                btn.classList.add("active");
            } else {
                btn.classList.remove("active");
            }
        });
    }
</script>