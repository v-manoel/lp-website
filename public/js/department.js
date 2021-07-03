window.onload = function() {
    setStatusColors();
}

function setStatusColors() {
    var status_elements = Array.from(document.getElementsByClassName("prod-status"));
    status_elements.forEach(element => {
        var bstrp_bg_color;
        switch (element.innerHTML.trim().toUpperCase()) {
            case "PAID":
                element.classList.add("bg-primary");
                break;
            case "PREPARED":
                element.classList.add("bg-warning");
                break;
            case "CHECKED":
                element.classList.add("my-bg-purple");
                break;
            case "DELIVERED":
                element.classList.add("bg-success");
                break;
            case "PREPARING":
                element.classList.add("my-bg-orange");
                break;
            case "CHECKING":
                element.classList.add("bg-danger");
                break;
            case "DELIVERING":    
                element.classList.add("my-bg-dark");
                break;       
            default:
                element.classList.add("my-bg-dark");
                break;
        }
    });

}