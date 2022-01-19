import React from "react";
import Paper from "./Paper";

/**
 * Papers Component
 * 
 * This connects to the papers API endpoint and maps the results onto the papers component,
 * displaying the appropriate information through different filters
 *  
 * @author Sam Oneil w18018623
 *  
 */

class Papers extends React.Component {
    constructor(props) {
        super(props)
        this.state = {
            results: []
        }
    }

    componentDidMount() {
        let url = "http://unn-w18018623.newnumyspace.co.uk/kf6012/coursework/part1/api/papers"

        fetch(url)
            .then((response) => {
                if (response.status === 200) {
                    return response.json()
                } else {
                    throw Error(response.statusText);
                }
            })
            .then((data) => {
                if (this.props.randomPaper) {
                    const randomPaper = Math.floor(Math.random() * data.results.length)
                    this.setState({ results: [data.results[randomPaper]] })
                } else {
                    this.setState({ results: data.results })
                }
            })
            .catch((err) => { console.log("An error as occured: ", err) });
    }

    filterSearch = (s) => {
        return s.title.toLowerCase().includes(this.props.search.toLowerCase()) || s.abstract.toLowerCase().includes(this.props.search.toLowerCase())
    }

    filterByAward = (paper) => {

        if (this.props.award === "all") {
            let filter = paper.awards.find(obj => {
                return obj.award_type_id !== undefined
            })
            return filter
        } else {
            let filter = paper.awards.find(obj => {
                return obj.award_type_id === this.props.award
            })
            return filter
        }
    }


    render() {

        let noData = ""

        if (this.state.results.length === 0) {
            noData = <p>No Data</p>
        }

        let filteredResults = this.state.results

        if (this.props.award) {
            console.log(this.props.award)
            filteredResults = filteredResults.filter(this.filterByAward)
        }




        if ((filteredResults.length > 0) && (this.props.search !== undefined)) {
            filteredResults = filteredResults.filter(this.filterSearch)
        }

        let buttons = ""

        if (this.props.page !== undefined) {
            const pageSize = 15
            let pageMax = this.props.page * pageSize
            let pageMin = pageMax - pageSize

            buttons = (
                <div>
                    <button onClick={this.props.handlePreviousClick} disabled={this.props.page <= 1}>Previous</button>
                    <button onClick={this.props.handleNextClick} disabled={this.props.page >= Math.ceil(filteredResults.length / pageSize)}>Next</button>
                </div>
            )
            filteredResults = filteredResults.slice(pageMin, pageMax)
        }

        console.log("Render")


        return (
            <div>
                <div>
                    {buttons}
                    {noData}
                    {filteredResults.map((paper, i) => (<Paper key={paper.title} paper={paper} />))}
                </div>

            </div>
        )
    }
}

export default Papers