document.getElementById('AddlinkIcon').onclick = function()
{
    document.getElementById('AddlinkIcon').style.transition = 'transform 1s ease-in-out';
    document.getElementById('FormAddLink').style.transition = 'visibility 1s ease-in-out';
    if(getComputedStyle(document.getElementById('FormAddLink')).visibility == "hidden")
    {
        document.getElementById('AddlinkIcon').style.transform = 'rotate(0deg)';
        document.getElementById('FormAddLink').style.visibility = "visible";
    }
    else
    {
        document.getElementById('AddlinkIcon').style.transform = 'rotate(-90deg)';
        document.getElementById('FormAddLink').style.visibility = "hidden";
    }
    
}
document.getElementById('EtatButton').onclick = function()
{
    if(document.getElementById('EtatButton').textContent == "To do")
    {
    var queryString = window.location.search;
    var searchParams = new URLSearchParams(queryString);
    var idBrief = searchParams.get('idBrief');
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
          if (this.readyState == 4 && this.status == 200) {
            window.location.href = window.location.href;
            
        }
    };
    xmlhttp.open("GET", "UpdateStatus?idBrief="+idBrief, true);
    xmlhttp.send();
    }
}
document.getElementById('ValiderLien').onclick = function()
{
    var queryString = window.location.search;
    var searchParams = new URLSearchParams(queryString);
    var idBrief = searchParams.get('idBrief');
    
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
          if (this.readyState == 4 && this.status == 200) {
            window.location.href = window.location.href;
        }
    };
    xmlhttp.open("GET", "UpdateStatus?idBrief="+idBrief+"&Lien="+document.getElementById('LienInput').value, true);
    xmlhttp.send();
}
