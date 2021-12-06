import React from "react";
import Films from "./Films.js";
import SelectLanguage from "./SelectLanguage.js";
import SearchBox from "./SearchBox.js";

class FilmPage extends React.Component {

    constructor(props) {
        super(props)
        this.state = {
            language: "",
            search: ""
        }

        this.handleLanguageSelect = this.handleLanguageSelect.bind(this);
    }

    handleSearch = (e) => {
        this.setState({ search: e.target.value })
    }
    handleLanguageSelect = (e) => {
        this.setState({ language: e.target.value })
    }


    render() {
        console.log(this.state.language)
        return (
            <div>
                <SearchBox search={this.state.search} handleSearch={this.handleSearch} />
                <SelectLanguage language={this.state.language} handleLanguageSelect={this.handleLanguageSelect} />
                <Films language={this.state.language} search={this.state.search} />
            </div>
        )
    }
}

export default FilmPage;