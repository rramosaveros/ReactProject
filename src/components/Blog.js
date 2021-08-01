import React, { Component } from "react";
// import axios from 'axios';
import Slider from './Slider';
import Sidebar from './Sidebar';
import Articles from './Articles'; 

class Blog extends Component {

    // ejemplo con axios
    // state = {
    //     articles: {},
    //     status: null
    // }

    render() {

        // ejemplo con axios, funciona pero hace miles de peticiones http y eso no está correcto 
        // axios.get("http://localhost:3900/api/articles")
        //     .then(res => {
        //         console.log(res.data);
        //         this.setState({
        //             articles: res.data.articles,
        //             status: 'success'
        //         });
        //     });

        return (
            <div id="blog">
                <Slider
                    title="Blog"
                    size="slider-small"
                />
                <div className="center">
                    <div id="content">
                        {/* Listado de artículos que vendrán del api rest de node js */}
                        {/* ejemplo con axios */}
                        {/* {this.state.status === 'success' &&
                            <div>
                                {this.state.articles.map((article) => {
                                    return (
                                        <h1 key={article._id}>{article.title}</h1>
                                    );
                                })}
                            </div>
                        } */}

                        <Articles />

                    </div>
                    <Sidebar
                        blog="true"
                    />
                </div>

            </div>
        );
    }
}

export default Blog; 