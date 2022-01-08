import React from "react";
import SearchBox from "./SearchBox.js";
import Footer from './Footer';
import SelectPage from "./SelectPage.js";
import Papers from "./Papers.js";
import Authors from "./Authors.js";

class AuthorsPage extends React.Component {
    constructor(props) {
        super(props)
        this.state = {
            titleSearch: "",
            abstractSearch: "",
            combinedSeearch: "",
            award: "",
            page: 1
        }
        /**
         * this.handleAwardSelect = this.handleAwardSelect.bind(this)
         * this.handleTitleSearch = this.handleTitleSearch.bind(this)
         * this.
         * 
         */
    }

    render() {
        return (
            <div>
                <Authors />
            </div>
        )
    }
}

export default AuthorsPage