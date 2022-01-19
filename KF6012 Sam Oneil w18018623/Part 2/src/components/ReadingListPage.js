import React from "react";
import Login from "./Login.js";
import Logout from "./Logout.js";
import ReadingList from "./ReadingList.js";
import Footer from "./Footer.js";
import SearchBox from "./SearchBox.js";

/**
 * Reading List Page component
 * 
 * This component displays either a login form or the reading list based on whether
 * or not the user is logged in
 * if they are they see their all the papers which the ones they have in their list checked
 * if they are not they see a log in page
 *  
 * @author Sam Oneil w18018623
 *  
 */

class ReadingListPage extends React.Component {
    constructor(props) {
        super(props)
        this.state = {
            authenticated: false,
            email: "",
            password: "",
            page: 1
        }

        this.handleSearch = this.handleSearch.bind(this);
        this.handleEmail = this.handleEmail.bind(this)
        this.handlePassword = this.handlePassword.bind(this)
        this.handleLoginClick = this.handleLoginClick.bind(this)
        this.handleNextClick = this.handleNextClick.bind(this)
        this.handlePreviousClick = this.handlePreviousClick.bind(this)
    }

    handlePassword = (e) => {
        this.setState({ password: e.target.value })
    }

    handleEmail = (e) => {
        this.setState({ email: e.target.value })
    }

    handleLoginClick = () => {
        let url = "http://unn-w18018623.newnumyspace.co.uk/kf6012/coursework/part1/api/authenticate"

        let formData = new FormData();
        formData.append('email', this.state.email);
        formData.append('password', this.state.password)

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
                    localStorage.setItem('myReadingListToken', data.results.token);
                    window.location.reload(false);
                }

            })
            .catch((err) => {
                console.log("An error has occured: ", err)
            });
    }

    handleLogoutClick = () => {
        this.setState({ authenticated: false })
        localStorage.removeItem('myReadingListToken')
    }

    handleSearch = (e) => {
        this.setState({ search: e.target.value, page: 1 })
    }

    handleNextClick = () => {
        this.setState({ page: this.state.page + 1 })
    }

    handlePreviousClick = () => {
        this.setState({ page: this.state.page - 1 })
    }

    componentDidMount() {
        if (localStorage.getItem('myReadingListToken')) {
            this.setState({ authenticated: true })
        }
    }

    render() {
        let page = (
            <div>
                <Login
                    handleEmail={this.handleEmail}
                    handlePassword={this.handlePassword}
                    handleLoginClick={this.handleLoginClick}
                />
                <Footer />
            </div>

        )
        if (this.state.authenticated) {
            page = (
                <div>
                    <Logout handleLogoutClick={this.handleLogoutClick} />
                    <SearchBox search={this.state.search} handleSearch={this.handleSearch} />

                    <ReadingList
                        search={this.state.search}
                        page={this.state.page}
                        handlePreviousClick={this.handlePreviousClick}
                        handleNextClick={this.handleNextClick} />
                    <Footer />
                </div>
            )
        }
        return (
            <div>{page}</div>
        )
    }
}

export default ReadingListPage;