  methods: {
        alertNotification(position = 'top-right', border, title, description) {
            const noti = this.$vs.notification({
                progress: 'auto',
                border,
                position,
                title: title,
                text: ` ${description} `
            })
        },
        alertNotificationMessage(status, res) {
            switch (status) {
                case 500:
                    this.alertNotification('top-right', 'danger', `Oops, Something Went Wrong ${status} Error! `, res.message);
                    break;
                case 422:
                    this.alertNotification('top-right', 'danger', `Oops, Unprocessable Entity ${status} Error! `, res.message);

                    break;
                case 200:
                    this.alertNotification('top-right', 'success', `response ${status} successfully! `, res);
                    break;
                case 301:
                    this.alertNotification('top-right', 'success', `Oops, Unprocessable Entity ${status} Error! `, res);
                    break;
                case 401:
                    this.alertNotification('top-right', 'danger', `Unauthorized, Oops Unprocessable Entity  Entity ${status} Error! `, res.message);
                    this.logoutUser();
                    break;
                default:
                    break;
            }
        },