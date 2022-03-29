<template>
<div>
    <link
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"
    rel="stylesheet"
  />
  <div class="container bootdey">
    <div v-if="post" class="post-btm">
      <h3 class="text-muted">
        <i class="fa"></i>👋 {{ post.title }}
      </h3>
      <hr>
      <a
        href="#"
        class="btn-link text-semibold media-heading box-inline"
        >{{ post.user_name }}</a
      >
      <p>
        {{ post.text }}
      </p>
    </div>
    <div class="col-md-12 bootstrap snippets">
      <div class="panel" id="submit-form">
        <div class="panel-body">
          <p v-if="user_repled" class="text-muted">reply to : "{{ this.user_repled }}" comment</p>
          <input type="text" class="form-control"
            rows="2"
            placeholder="Enter Your Name!" v-model="user_name">
          <textarea
            class="form-control"
            rows="2"
            placeholder="Leave a comment!" v-model="commentText"
          ></textarea>
          <div class="mar-top clearfix">
            <button class="btn btn-sm btn-primary pull-right" type="submit" @click="storeComment">
              <i class="fa fa-pencil fa-fw"></i> Share
            </button>
            
          </div>
        </div>
      </div>

      <div class="panel">
        <div class="panel-body">
          <!-- start -->
          <div v-for="(Comment, index) in allCommentsPost" :key="Comment.id" class="media-block">
            <div class="media-body-comment" >
              <div v-if="Comment.comment">
                <a class="media-left" href="#"
                  ><img
                    class="img-circle img-sm"
                    alt="Profile Picture"
                    src="https://bootdey.com/img/Content/avatar/avatar1.png"
                /></a>
              <div class="mar-btm">
                <a
                  href="#"
                  class="btn-link text-semibold media-heading box-inline"
                  >{{ Comment.comment.user_name }}</a
                >
                <p class="text-muted text-sm">
                  <i class="fa fa-mobile fa-lg"></i> {{ Comment.comment.title }}
                </p>
              </div>
              <p>
                {{ Comment.comment.text }}
              </p>
              <div class="pad-ver">
                <div class="btn-group">
                  <a class="btn btn-sm btn-default btn-hover-success" href="#"
                    ><i class="fa fa-thumbs-up"></i
                  ></a>
                  <a class="btn btn-sm btn-default btn-hover-danger" href="#"
                    ><i class="fa fa-thumbs-down"></i
                  ></a>
                </div>
                <a class="btn btn-sm btn-default btn-hover-primary" href="#submit-form" @click="set_comment_id(Comment.comment.id,Comment.comment.user_name)"
                  >Comment</a
                >
              </div>
              </div>
              <hr />

              <!-- Comments -->
              <div>
                <div class="media-block" v-if="Comment.child1_comment">
                  <div class="media-body-child1">
                      <a class="media-left" href="#"
                        ><img
                          class="img-circle img-sm"
                          alt="Profile Picture"
                          src="https://bootdey.com/img/Content/avatar/avatar2.png"
                      /></a>
                    <div class="mar-btm">
                      <a
                        href="#"
                        class="btn-link text-semibold media-heading box-inline"
                        >{{ Comment.child1_comment.user_name }}</a
                      >
                      <p class="text-muted text-sm">
                        <i class="fa fa-mobile fa-lg"></i>{{ Comment.child1_comment.title }}
                      </p>
                    </div>
                    <p>
                      {{ Comment.child1_comment.text }}
                    </p>
                    <div class="pad-ver">
                      <a
                        class="btn btn-sm btn-default btn-hover-primary"
                        href="#submit-form" @click="set_child1comment_id(Comment.child1_comment.id,Comment.child1_comment.user_name)"
                        >Comment</a
                      >
                    </div>
                    </div>
                    <hr />
                </div>

                <div class="media-block" v-if="Comment.child2_comment">
                  <div class="media-body-child2">
                      <a class="media-left" href="#"
                        ><img
                          class="img-circle img-sm"
                          alt="Profile Picture"
                          src="https://bootdey.com/img/Content/avatar/avatar3.png"
                        />
                      </a>
                    <div class="mar-btm">
                      <a
                        href="#"
                        class="btn-link text-semibold media-heading box-inline"
                        >{{ Comment.child2_comment.user_name }}</a
                      >
                      <p class="text-muted text-sm">
                        <i class="fa fa-globe fa-lg"></i> {{ Comment.child2_comment.title }}
                      </p>
                    </div>
                    <p>
                      {{ Comment.child2_comment.text }}
                    </p>
                    <div class="pad-ver">
                      <a
                        class="btn btn-sm btn-default btn-hover-primary"
                        href="#submit-form" @click="set_child2comment_id(Comment.child2_comment.id,Comment.child2_comment.user_name)"
                        >Comment</a
                      >
                    </div>
                    <hr />
                  </div>
                </div>
                <div class="media-block" v-if="Comment.child3_comment">
                  <div class="media-body-child3">
                      <a class="media-left" href="#"
                        ><img
                          class="img-circle img-sm"
                          alt="Profile Picture"
                          src="https://bootdey.com/img/Content/avatar/avatar4.png"
                        />
                      </a>
                    <div class="mar-btm">
                      <a
                        href="#"
                        class="btn-link text-semibold media-heading box-inline"
                        >{{ Comment.child3_comment.user_name }}</a
                      >
                      <p class="text-muted text-sm">
                        <i class="fa fa-globe fa-lg"></i> {{ Comment.child3_comment.title }}
                      </p>
                    </div>
                    <p>
                      {{ Comment.child3_comment.text }}
                    </p>
                    <div class="pad-ver">
                      <a
                        class="btn btn-sm btn-default btn-hover-primary"
                        href="#" 
                        ></a
                      >
                    </div>
                    <hr />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- finish -->
        </div>
      </div>
    </div>
  </div>
</div>

</template>

<script>


export default {
    name: "blog-component",
    data() {
        return {
            allCommentsPost : null,
            name: "blog-component",
            post: null,
            commentText: null,
            user_name: null,
            user_repled: null,
            comment_idcomment_id : null,
            child1_comment_idchild1_comment_id : null,
            child2_comment_idchild2_comment_id : null,
            child3_comment_idchild3_comment_id : null,
        }
    },
    mounted() {
        console.log("Component mounted.");
        this.getAllCommentsPost();
        this.getPostById();
        
    },
    methods: {
      getAllCommentsPost() {
          axios.get('api/comments/all',{params : { "postId": 1 }}).then(
              (response) => {
                  console.log(response.data);
                  if (response.data.success) {
                      this.allCommentsPost = response.data.data;
                      console.log(this.allCommentsPost)
                  }
              })
      },
      getPostById() {
          axios.get('api/post',{params : { "id": 1 }}).then(
              (response) => {
                  console.log(response.data);
                  if (response.data.success) {
                      this.post = response.data.data;
                      console.log('yyyyyy',this.post.id)
                      this.getAllCommentsPost()
                  }
              })
      },
      storeComment(){
        axios.post('api/comment/store', { 
          "user_name": this.user_name,
          "text": this.commentText,
          "post_id": this.post.id,
          "comment_id": this.comment_id,
          "child1_comment_id": this.child1_comment_id,
          "child2_comment_id": this.child2_comment_id,
          "child3_comment_id": this.child3_comment_id,
           }).then(
              (response) => {
                  console.log(response.data);
                  if (response.data.success) {
                      console.log(response.data.data)
                      this.showAlert()
                      this.clearForm()
                  }
              })
      },
      showAlert() {
      this.$swal('That was successfull!');
      },
      clearForm(){
        this.user_name = null;
        this.commentText = null;
        this.comment_id = null;
        this.child1_comment_id = null;
        this.child2_comment_id = null;
        this.child3_comment_id = null;
        this.user_repled = null;
      },
      set_comment_id(comment_id,user_repled){
        this.user_repled = user_repled;
          this.comment_id = comment_id;
      },
      set_child1comment_id(child1_comment_id,user_repled){
        this.user_repled = user_repled;
        this.child1_comment_id = child1_comment_id;
      },
      set_child2comment_id(child2_comment_id,user_repled){
        this.user_repled = user_repled;
        this.child2_comment_id = child2_comment_id;
      },
      set_child3comment_id(child3_comment_id,user_repled){
        this.user_repled = user_repled;
        this.child3_comment_id = child3_comment_id;
      },
    }
};
</script>

<style>
body{
    margin-top:20px;
    background:#ebeef0;
}

.img-sm {
    width: 46px;
    height: 46px;
}

.panel {
    box-shadow: 0 2px 0 rgba(0,0,0,0.075);
    border-radius: 0;
    border: 0;
    margin-bottom: 15px;
}

.panel .panel-footer, .panel>:last-child {
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
}

.panel .panel-heading, .panel>:first-child {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}



.panel-body {
    padding: 25px 20px;
}


.media-block .media-left {
    display: block;
    float: left
}

.media-block .media-right {
    float: right
}

.media-block .media-body {
    display: block;
    overflow: hidden;
    width: auto;
    margin-left:5%
}

.media-block .media-body-comment {
  box-shadow: rgba(255, 255, 255, 0.1) 0px 1px 1px 0px inset, rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
    display: block;
    overflow: hidden;
    width: auto;
    margin-left:5%;
    margin-bottom: 2%;
    border-radius: 5%;
    padding-top: 3%;
    padding-left: 2%;
    
}

.media-block .media-body-child1{
    display: block;
    overflow: hidden;
    width: auto;
    margin-left:9%;
    margin-bottom: 2%;
    border-radius: 5%;
    padding-top: 3%;
    padding-left: 2%;
}

.media-block .media-body-child2{
    display: block;
    overflow: hidden;
    width: auto;
    margin-left:13%;
    margin-bottom: 2%;
    border-radius: 5%;
    padding-top: 3%;
    padding-left: 2%;
}

.media-block .media-body-child3{
    display: block;
    overflow: hidden;
    width: auto;
    margin-left:17%;
    margin-bottom: 2%;
    border-radius: 5%;
    padding-top: 3%;
    padding-left: 2%;
}

.middle .media-left,
.middle .media-right,
.middle .media-body {
    vertical-align: middle
}

.thumbnail {
    border-radius: 0;
    border-color: #e9e9e9
}

.tag.tag-sm, .btn-group-sm>.tag {
    padding: 5px 10px;
}

.tag:not(.label) {
    background-color: #fff;
    padding: 6px 12px;
    border-radius: 2px;
    border: 1px solid #cdd6e1;
    font-size: 12px;
    line-height: 1.42857;
    vertical-align: middle;
    -webkit-transition: all .15s;
    transition: all .15s;
}
.text-muted, a.text-muted:hover, a.text-muted:focus {
    color: #acacac;
}
.text-sm {
    font-size: 0.9em;
}
.text-5x, .text-4x, .text-5x, .text-2x, .text-lg, .text-sm, .text-xs {
    line-height: 1.25;
}

.btn-trans {
    background-color: transparent;
    border-color: transparent;
    color: #929292;
}

.btn-icon {
    padding-left: 9px;
    padding-right: 9px;
}

.btn-sm, .btn-group-sm>.btn, .btn-icon.btn-sm {
    padding: 5px 10px !important;
}

.mar-top {
    margin-top: 15px;
}
.post-btm{
  box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
  margin: 5%;
  padding: 5%;
  
  
}
</style>