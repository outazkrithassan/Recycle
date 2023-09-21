<template>
    <div class="container mt-4">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="card">
            <div class="card-header">Conversation for the item : </div>
            <div class="card-body height3">
              <ul class="chat-list">
                <li v-for="message in messages" :class="{ 'in': message.sender.id === user, 'out': message.sender.id !== user }">

                  <div class="chat-img">
                    <!-- {{ Storage::url($ObjetDat->Image_Objet) }} -->
                    <img alt="Avatar" src="https://bootdey.com/img/Content/avatar/avatar1.png">
                  </div>
                  <div class="chat-body">
                    <div class="chat-message">
                      <h5 id="NOM">{{ message.sender.nom + ' ' + message.sender.prenom }}</h5>
                      <p id="CONTENT">{{ message.content }}</p>
                    </div>
                  </div>
                </li>
                <!-- Add more chat messages with product names as needed -->
              </ul>
            </div>
            <div class="card-footer">
              <form @submit.prevent="repondre">
                <!-- <input type="hidden" name="reciever_id" :value="sender_id">
                <input type="hidden" name="objet_id" :value="objet_id"> -->
                <textarea v-model="newMessage" class="form-control" placeholder="Write message ...."></textarea>
                <button type="submit" class="btn btn-success mt-2">Envoyer</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>


<script>

export default {

    props : {
        user : Number ,
        objet : Number ,
        sender : Number
    } ,

    mounted () {
        this.getMessages() ;
        window.Echo.channel('message').listen('NewMessage' , (e) => {
            console.log(e.message);
            this.messages = [ ...this.messages , e.message ]
            console.log(this.messages);
        } )

    }

    ,

    data(){
        return {
            newMessage : '' ,
            messages : []
        }
    }

    ,

    methods : {
        getMessages () {
            axios.get(`http://127.0.0.1:8000/lire-message/${this.sender}/${this.objet}`).then( ({ data }) => {
                this.messages =  data.messages
            } )
        }
        ,
        repondre () {
            const data = {
                content : this.newMessage ,
                reciever_id : this.sender ,
                objet_id : this.objet
            }

           const token = document.head.querySelector("meta[name='csrf-token']").content;
            fetch('http://127.0.0.1:8000/send-response' , {
                method : "post" ,
                headers : {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN' : token ,
                } ,
                body : JSON.stringify(data)
            }).then( ( resp ) => resp.json()  ).then(data => {
                this.newMessage = "" ;
            }) .catch(err => console.log(err)) ;

        }
    }

}

</script>




<style scoped>

body{
background:#eee;
}
.chat-list {
padding: 0;
font-size: .8rem;
}

.chat-list li {
margin-bottom: 10px;
overflow: auto;
color: #ffffff;
}

.chat-list .chat-img {
float: left;
width: 48px;
}

.chat-list .chat-img img {
-webkit-border-radius: 50px;
-moz-border-radius: 50px;
border-radius: 50px;
width: 100%;
}

.chat-list .chat-message {
-webkit-border-radius: 50px;
-moz-border-radius: 50px;
border-radius: 50px;
background: #5a99ee;
display: inline-block;
padding: 10px 20px;
position: relative;
}

.chat-list .chat-message:before {
content: "";
position: absolute;
top: 15px;
width: 0;
height: 0;
}

.chat-list .chat-message h5 {
margin: 0 0 5px 0;
font-weight: 600;
line-height: 100%;
font-size: .9rem;
}

.chat-list .chat-message p {
line-height: 18px;
margin: 0;
padding: 0;
}

.chat-list .chat-body {
margin-left: 20px;
float: left;
width: 70%;
}

.chat-list .in .chat-message:before {
left: -12px;
border-bottom: 20px solid transparent;
border-right: 20px solid #5a99ee;
}

.chat-list .out .chat-img {
float: right;
}

.chat-list .out .chat-body {
float: right;
margin-right: 20px;
text-align: right;
}

.chat-list .out .chat-message {
background: #fc6d4c;
}

.chat-list .out .chat-message:before {
right: -12px;
border-bottom: 20px solid transparent;
border-left: 20px solid #fc6d4c;
}

.card .card-header:first-child {
-webkit-border-radius: 0.3rem 0.3rem 0 0;
-moz-border-radius: 0.3rem 0.3rem 0 0;
border-radius: 0.3rem 0.3rem 0 0;
}
.card .card-header {
background: #17202b;
border: 0;
font-size: 1rem;
padding: .65rem 1rem;
position: relative;
font-weight: 600;
color: #ffffff;
}

.content{
margin-top:40px;
}






</style>
