import React, { useEffect, useState } from "react";
import { fetchPizza } from "../api/api";
const Menu = () => {
  const [products, setProducts] = useState([]);
  useEffect(() => {
    const getPizza = async () => {
      const pizzaData = await fetchPizza();
      setProducts(pizzaData);
      // console.log(pizzaData);
    };

    getPizza();
  }, []);

  return (
    <div className="container-xxl mt-4">
      <div className="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
        {products.map((product) => (
          <div key={product.id} className="col">
            <div className="card h-100 d-flex flex-column shadow">
              <img
                src={product.image}
                className="card-img-top object-fit-cover"
                alt={product.title}
                style={{ height: "200px" }}
              />
              <div className="card-body d-flex flex-column">
                <h5 className="card-title">{product.title}</h5>
                <p className="card-text flex-grow-1 text-truncate">
                  {product.description}
                </p>
                <button href="#" className="btn btn-success w-50">
                  Available
                </button>
                <div className="d-flex flex-column gap-2 mt-2">
                  <button href="#" className="btn btn-primary w-100">
                    Edit
                  </button>
                  <button href="#" className="btn btn-danger w-100">
                    Delete
                  </button>
                </div>
              </div>
            </div>
          </div>
        ))}
      </div>
    </div>
  );
};

export default Menu;
