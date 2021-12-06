import React from "react";
import Film from './Film.js';


class Films extends React.Component {
    constructor(props) {
        super(props)
        this.state = { results: [] }
    }

    componentDidMount() {
        // const randomFilmId = Math.floor(Math.random() * 1000) + 1

        let url = "http://localhost/webappinterface/KF6012-Web-Application-Integration/week6/api/films"



        if (this.props.actorid !== undefined) {
            url += "?actor_id=" + this.props.actorid
        } else if (this.props.randomFilmId !== undefined) {
            url += "?id=" + this.props.randomFilmId
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
                this.setState({ results: data.results })
            })
            .catch((err) => {
                console.log("Something went wrong ", err)
            });
    }

    filterByLanguage = (film) => {
        return ((film.language === this.props.language) || (this.props.language === ""))
    }

    filterSearch = (s) => {
        return s.title.toLowerCase().includes(this.props.search.toLowerCase())
    }

    render() {
        let noData = "";

        if (this.state.results.length === 0) {
            noData = <p>No data</p>
        }

        //const filteredResults = this.state.results.filter(this.filterByLanguage)

        let filteredResults = this.state.results

        if ((filteredResults.length > 0) && (this.props.search !== undefined)) {
            filteredResults = this.state.results.filter(this.filterSearch)
        }

        return (
            <div>
                {noData}
                {filteredResults.map((film, i) => (<Film key={i} film={film} />))}
            </div>
        )
    }
}

export default Films;