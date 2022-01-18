import React from "react";
import Films from "./Films.js";
import SelectLanguage from "./SelectLanguage.js";
import SearchBox from "./SearchBox.js";
import Footer from './Footer';
import SelectPage from "./SelectPage.js";


class FilmPage extends React.Component {
    constructor(props) {
        super(props)
        this.state = {
            language: "",
            search: "",
            page: 1
        }
        this.handleLanguageSelect = this.handleLanguageSelect.bind(this);
        this.handleSearch = this.handleSearch.bind(this);
        this.handleNextClick = this.handleNextClick.bind(this)
        this.handlePreviousClick = this.handlePreviousClick.bind(this)
    }

    handleSearch = (e) => {
        this.setState({ search: e.target.value, page: 1 })
    }

    handleLanguageSelect = (e) => {
        this.setState({ language: e.target.value, page: 1 })
    }

    handleNextClick = () => {
        this.setState({ page: this.state.page + 1 })
    }

    handlePreviousClick = () => {
        this.setState({ page: this.state.page - 1 })
    }

    handlePageSelect = (e) => {
        this.setState({ page: e.target.value })
    }

    render() {
        console.log(this.state.search)
        return (
            <div>
                <SearchBox search={this.state.search} handleSearch={this.handleSearch} />
                <SelectLanguage language={this.state.language} handleLanguageSelect={this.handleLanguageSelect} />

                <Films
                    language={this.state.language}
                    search={this.state.search}
                    page={this.state.page}
                    handlePreviousClick={this.handlePreviousClick}
                    handleNextClick={this.handleNextClick}
                />
                <SelectPage page={this.state.page} handlePageSelect={this.handlePageSelect} />
                <Footer />
            </div>
        )
    }
}

export default FilmPage;