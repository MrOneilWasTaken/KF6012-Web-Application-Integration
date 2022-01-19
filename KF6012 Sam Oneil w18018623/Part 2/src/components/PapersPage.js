import React from "react";
import SearchBox from "./SearchBox.js";
import Footer from './Footer';
import Papers from "./Papers.js";
import SelectAward from "./SelectAward.js";
/**
 * Papers Page Component
 * 
 * This component determines how papers page looks and what gets displayed
 * as well as sets up user interaction
 *  
 * @author Sam Oneil w18018623
 *  
 */
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
                <p><SearchBox search={this.state.search} handleSearch={this.handleSearch} /></p>

                <SelectAward award={this.state.award} handleAwardSelect={this.handleAwardSelect} />

                <Papers
                    search={this.state.search}
                    award={this.state.award}
                    page={this.state.page}
                    handlePreviousClick={this.handlePreviousClick}
                    handleNextClick={this.handleNextClick}
                    handleAwardSelect={this.handleAwardSelect}
                />

                <Footer />
            </div>
        )
    }
}

export default PapersPage