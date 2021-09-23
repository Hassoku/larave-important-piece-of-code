<script>
    onSubmit(){
              let formData = new FormData();
                formData=Object.assign(this.user,formData);

                axios.post('/management/user',formData).then((res)=>{
                      this.$root.alertNotificationMessage(res.status,"New user has been created successfully");
                      setTimeout(() => {
                          this.$router.push({ name: 'users' })
                      }, 1000);
                }).catch((err)=>{
                     if(err.response.status==422){
                         this.errors=err.response.data.errors;
                        return this.$root.alertNotificationMessage(err.response.status,err.response.data.errors);
                    }
                 this.$root.alertNotificationMessage(err.response.status,err.response.data);

                  });
      }
</script>