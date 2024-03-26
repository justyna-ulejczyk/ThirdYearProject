function newCanvas(clickedElement){
    var canvasFile = document.getElementById("newCanvasContent")
    
    if(canvasFile.style.display === "flex"){
        canvasFile.style.display = "none";
    }else{
        canvasFile.style.display = "flex";
    }

}

