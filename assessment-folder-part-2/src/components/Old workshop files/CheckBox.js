import React from "react";

class CheckBox extends React.Component {
    constructor(props) {
        super(props)
        this.state = { checked: false }
    }

    componentDidMount() {
        let filteredList = this.props.viewinglist.filter((item) => (this.isOnList(item)))
        if (filteredList.length > 0) {
            this.setState({ checked: true })
        }
    }

    isOnList = (item) => {
        return (item.film_id === this.props.film_id)
    }

    addToViewingList = () => {
        let url = "http://localhost/webappinterface/KF6012-Web-Application-Integration/week11/api/viewinglist"

        let formData = new FormData();
        formData.append('token', localStorage.getItem('myViewingListToken'))
        formData.append('add', this.props.film_id)

        fetch(url, {
            method: 'POST',
            headers: new Headers(),
            body: formData
        })
            .then((response) => {
                if ((response.status === 200) || (response.status === 204)) {
                    this.setState({ checked: !this.state.checked })
                } else {
                    throw Error(response.statusText)
                }
            })
            .catch((err) => {
                console.log("Something wrong bud ", err)
            });
    }

    removeFromViewingList = () => {
        let url = "http://localhost/webappinterface/KF6012-Web-Application-Integration/week11/api/viewinglist"

        let formData = new FormData();
        formData.append('token', localStorage.getItem('myViewingListToken'))
        formData.append('remove', this.props.film_id)

        fetch(url, {
            method: 'POST',
            headers: new Headers(),
            body: formData
        })
            .then((response) => {
                if ((response.status === 200) || (response.status === 204)) {
                    this.setState({ checked: !this.state.checked })
                } else {
                    throw Error(response.statusText);
                }
            })
            .catch((err) => {
                console.log("something went wrong ", err)
            });
    }

    handleOnChange = () => {
        if (this.state.checked) {
            this.removeFromViewingList()
        } else {
            this.addToViewingList()
        }
    }

    render() {
        return (
            <input
                type="checkbox"
                id="viewlist"
                name="viewlist"
                value="film"
                checked={this.state.checked}
                onChange={this.handleOnChange}
            />
        )
    }
}

export default CheckBox;