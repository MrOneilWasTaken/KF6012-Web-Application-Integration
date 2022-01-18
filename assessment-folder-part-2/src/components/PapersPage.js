import React from "react";
import SearchBox from "./SearchBox.js";
import Footer from './Footer';
import Papers from "./Papers.js";

class PapersPage extends React.Component {
    constructor(props) {
        super(props)
        this.state = {
            search: "",
            award: "",
            page: 1
        }
        this.handleSearch = this.handleSearch.bind(this);
        this.handleNextClick = this.handleNextClick.bind(this)
        this.handlePreviousClick = this.handlePreviousClick.bind(this)
        this.handleAwardSelect = this.handleAwardSelect.bind(this)
    }

    handleSearch = (e) => {
        this.setState({ search: e.target.value, page: 1 })
    }

    handleAwardSelect = (e) => {
        this.setState({ award: e.target.value, page: 1 })
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
        return (
            <div>
                <SearchBox search={this.state.search} handleSearch={this.handleSearch} />

                <Papers
                    search={this.state.search}
                    page={this.state.page}
                    handlePreviousClick={this.handlePreviousClick}
                    handleNextClick={this.handleNextClick}
                    handleAwardSelect={this.handleAwardSelect}
                />
                {/* <AwardSearch /> */}
                <Footer />
            </div>
        )
    }
}

export default PapersPage