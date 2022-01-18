import React from "react";
import Login from "./Login.js";
import Logout from "./Logout.js";
import ViewingList from "./ViewingList.js";

class ViewingListPage extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            authenticated: false,
            email: "",
            password: ""
        }

        this.handleEmail = this.handleEmail.bind(this);
        this.handlePassword = this.handlePassword.bind(this);
        this.handleLoginClick = this.handleLoginClick.bind(this);
    }

    handlePassword = (e) => {
        this.setState({ password: e.target.value })
    }

    handleEmail = (e) => {
        this.setState({ email: e.target.value })
    }

    handleLoginClick = () => {
        let url = "http://localhost/webappinterface/KF6012-Web-Application-Integration/week11/api/authenticate"

        let formData = new FormData();
        formData.append('email', this.state.email);
        formData.append('password', this.state.password);

        fetch(url, {
            method: 'POST',
            headers: new Headers(),
            body: formData
        })
            .then((response) => {
                // if theres a succesfful auth, return data
                if (response.status === 200) {
                    return response.json()
                } else {
                    throw Error(response.statusText)
                }
            })
            .then((data) => {
                console.log(data)

                if ("token" in data.results) {
                    this.setState({ authenticated: true })

                    //Save into local storage
                    localStorage.setItem('myViewingListToken', data.results.token);
                }
            })
            .catch((err) => {
                console.log("something went wrong mate, ", err)
            });
    }

    handleLogoutClick = () => {
        this.setState({ authenticated: false })
        localStorage.removeItem('myViewingListToken');
    }

    componentDidMount() {
        if (localStorage.getItem('myViewingListToken')) {
            this.setState({ authenticated: true })
        }
    }

    render() {
        let page = (
            <Login
                handleEmail={this.handleEmail}
                handlePassword={this.handlePassword}
                handleLoginClick={this.handleLoginClick}
            />
        )
        if (this.state.authenticated) {
            page = (
                <div>
                    <Logout handleLogoutClick={this.handleLogoutClick} />
                    <ViewingList />
                </div>
            )
        }
        return (
            <div>{page}</div>
        )
    }
}

export default ViewingListPage;