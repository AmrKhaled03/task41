const openAside = () => {
  document.getElementById("aside").classList.toggle("active");
  let btnOp = document.getElementById("btnOp");
  let main = document.querySelector(".main");
  if (document.getElementById("aside").classList.contains("active")) {
    btnOp.innerHTML = "CLOSE";
    main.style.cssText = `
      overflow: hidden;
    width: calc(100%-400px);
    height: auto;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-left:400px
    `;
    document.querySelector("table").style.width = "100%";
  } else {
    btnOp.innerHTML = "OPEN";
    main.style.cssText = `
            overflow: hidden;
        
            width: 100%;
            height: auto;
            display: block;
        `;
  }
};
