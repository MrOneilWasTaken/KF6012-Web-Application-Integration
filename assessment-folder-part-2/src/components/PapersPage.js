import React from "react";
import Films from "./Films.js";
import SelectLanguage from "./SelectLanguage.js";
import SearchBox from "./SearchBox.js";
import Footer from './Footer';
import SelectPage from "./SelectPage.js";
import Papers from "./Papers.js";

class PapersPage extends React.Component {
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
                <Papers />
            </div>
        )
    }
}

export default PapersPage