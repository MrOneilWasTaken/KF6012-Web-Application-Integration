import React from "react";
import Film from "./Film";

class Films extends React.Component {
    constructor(props) {
        super(props)
        this.state = {
            results: []
        }
    }

    componentDidMount() {
        let url = "http://localhost/webappinterface/KF6012-Web-Application-Integration/week11/api/films"

        if (this.props.actorid !== undefined) {
            url += "?actor_id=" + this.props.actorid
        }

        fetch(url)
            .then((response) => {
                if (response.status === 200) {
                    return response.json()
                } else {
                    throw Error(response.statusText);
                }
            })
            .then((data) => {
                if (this.props.randomFilm) {
                    const randomFilmId = Math.floor(Math.random() * data.results.length)
                    this.setState({ results: [data.results[randomFilmId]] })
                } else {
                    this.setState({ results: data.results })
                }
            })
            .catch((err) => {
                console.log("Something went wrong m8", err)
            });
    }

    filterByLanguage = (film) => {
        return ((film.language === this.props.language) || (this.props.language === ""))
    }

    filterSearch = (s) => {
        return s.title.toLowerCase().includes(this.props.search.toLowerCase())
    }

    render() {
        let noData = ""

        if (this.state.results.length === 0) {
            noData = <p>No Data m8</p>
        }

        let filteredResults = this.state.results

        if (this.props.language !== undefined) {
            filteredResults = filteredResults.filter(this.filterByLanguage)
        }


        if ((filteredResults.length > 0) && (this.props.search !== undefined)) {
            filteredResults = filteredResults.filter(this.filterSearch)
        }

        let buttons = ""

        if (this.props.page !== undefined) {
            const pageSize = 10
            let pageMax = this.props.page * pageSize
            let pageMin = pageMax - pageSize


            buttons = (
                <div>
                    <button onClick={this.props.handlePreviousClick} disabled={this.props.page <= 1}>Previous</button>
                    <button onClick={this.props.handleNextClick} disabled={this.props.page >= Math.ceil(filteredResults.length / pageSize)}>Next</button>
                </div>
            )
            filteredResults = filteredResults.slice(pageMin, pageMax);
        }

        return (
            <div>
                {noData}
                {filteredResults.map((film, i) => (<Film key={film.title} film={film} />))}
                {buttons}
            </div>
        )
    }
}

export default Films;