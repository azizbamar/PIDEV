
window.onload = () => {
    const FiltersForm = document.querySelector("#filters");
    document.querySelectorAll("#filters input").forEach(input => {
        input.addEventListener("change",() => {
            const Form = new FormData(FiltersForm); 
            const Params = new URLSearchParams();
            Form.forEach(function(value, key) {
                Params.append(key,value)
                console.log(Params.toString());

            })

            const url = new URL(window.location.href);
            fetch(url.pathname + "?" + Params.toString() + "&ajax=1",{
                headers : {
                    "X-Requested-With" : "XMLHttpRequest"
                }
            }).then((response)=>{
                console.log(response);
            }).catch((error)=>alert(error))
        })
    })
}


