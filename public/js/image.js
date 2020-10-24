window.onload = () => {
    //Gestion des boutons "Supprimer"
    let links = document.querySelectorAll("[data-delete]")
    // On boucle sur links
    for(link of links){
      link.addEventListener("click", function(e){
        e.preventDefault()
        if(confirm("Voulez vous supprimer cette image ?")){
            //on envoie une requête Ajax vers le href du lien avec la methode DELETE
            fetch(this.getAttribute("href"),{
                method: "DELETE",
                headers: {
                    "X-Requested-With" : "XMLHttpRequest",
                    "Content-Type": "application/json" 
                },
                body: JSON.stringify({"_token": this.dataset.token})
            }).then(
                //On récupère le réponse en JSON
                response => response.json()
            ).then(data => {
                if(data.success)
                this.parentElement.remove()
                else 
                alert(data.error)
            }).catch(e => alert(e))
          
        }
      })
    }
  
    
    }