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
            search: "",
            page: 1
        }
        this.handleSearch = this.handleSearch.bind(this);
        this.handleNextClick = this.handleNextClick.bind(this)
        this.handlePreviousClick = this.handlePreviousClick.bind(this)
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

    render() {
        return (
            <div>
                <SearchBox search={this.state.search} handleSearch={this.handleSearch} />
                <Authors
                    search={this.state.search}
                    page={this.state.page}
                    handlePreviousClick={this.handlePreviousClick}
                    handleNextClick={this.handleNextClick}
                />
                <Footer />

            </div>
        )
    }
}

export default AuthorsPage